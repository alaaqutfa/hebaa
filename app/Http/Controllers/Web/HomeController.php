<?php
namespace App\Http\Controllers\Web;

use App\Models\Article;
use App\Models\DonationCampaign;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController
{
    public function index()
    {
        $heroProjects  = getHeroProjects();
        $featured      = getFeaturedArticle();
        $categories    = getCategory();
        $latestProject = Article::published()->paginate(9);

        $activeCampaigns = DonationCampaign::where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('end_date')
                    ->orWhere('end_date', '>', now());
            })
            ->orderBy('start_date', 'desc')
            ->paginate(9);
        return view("web.home", compact("heroProjects", "featured", "categories", "activeCampaigns","latestProject"));
    }

    public function about()
    {
        return view("web.about");
    }

    public function search(Request $request)
    {
        $query   = $request->input('q');
        $results = [];

        if ($query) {
            // 1. جلب كل المفاتيح التي تطابق قيمة البحث بالعربية
            $translations = Translation::where('value', 'like', "%{$query}%")
                ->where('locale', session('lang_code', 'ar'))
                ->get();

            $searchTerms = [];

            foreach ($translations as $translation) {
                $key = $translation->key;

                // إذا كان المفتاح ديناميكي مثل content_11
                if (Str::startsWith($key, ['content_', 'title_', 'description_', 'text_'])) {
                    $english = Translation::where('key', $key)
                        ->where('locale', 'en')
                        ->value('value'); // نأخذ القيمة مباشرة

                    $searchTerms[] = $english ?? $key;
                } else {
                    // المفتاح طبيعي
                    $searchTerms[] = $key;
                }
            }

            // fallback في حال ما وجد ترجمات، نستخدم الكلمة نفسها
            if (empty($searchTerms)) {
                $searchTerms[] = $query;
            }

            // 2. البحث في المقالات باستخدام كل الكلمات المقابلة
            $results = Article::where(function ($q) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    $q->orWhere('title', 'like', "%{$term}%")
                        ->orWhere('content', 'like', "%{$term}%");
                }
            })->paginate(10);
        }

        return view('web.search', compact('results', 'query'));
    }
}
