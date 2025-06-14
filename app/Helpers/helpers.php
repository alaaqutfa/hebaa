<?php
use App\Models\Article;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Donation;
use App\Models\DonationCampaign;
use App\Models\Language;
use App\Models\Setting;
use App\Models\Translation;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\App;

if (! function_exists("getDonationPaidAmount")) {
    function getDonationPaidAmount(DonationCampaign $campaign)
    {
        return Donation::where('campaign_id', $campaign->id)
            ->where('status', 'paid')
            ->sum('amount') ?? 0;
    }
}

if (! function_exists('is_campaign_expired')) {
    function is_campaign_expired(DonationCampaign $campaign): bool
    {
        $now = now();
        return $campaign->end_date && $campaign->end_date < $now;
    }
}

if (! function_exists('is_campaign_collected')) {
    function is_campaign_collected(DonationCampaign $campaign): bool
    {
        $collected = Donation::where('campaign_id', $campaign->id)
            ->where('status', 'paid')
            ->sum('amount');

        return $collected >= $campaign->target_amount;
    }
}

if (! function_exists('getLanguage')) {
    function getLanguage()
    {
        return Language::active()->get();
    }
}

if (! function_exists('getAdminLanguage')) {
    function getAdminLanguage()
    {
        return Language::all();
    }
}

if (! function_exists('getByLocale')) {
    function getByLocale($locale)
    {
        return Translation::where('locale', $locale)
            ->orderBy('key')
            ->pluck('value', 'key');
    }
}

if (! function_exists('getCategory')) {
    function getCategory()
    {
        return Category::all();
    }
}

if (! function_exists('getArticle')) {
    function getArticle()
    {
        return Article::published()->get();
    }
}

if (! function_exists('getRecentArticlesForSelectedCategories')) {
    function getRecentArticlesForSelectedCategories($categories, $excludeId = null, $limitPerCategory = 2)
    {
        $result              = [];
        $collectedArticleIds = [];

        foreach ($categories as $category) {
            $articles = $category->articles()
                ->with(['images', 'categories'])
                ->latest()
                ->get()
                ->filter(function ($article) use (&$collectedArticleIds, $excludeId) {
                    return $article->id !== $excludeId && ! in_array($article->id, $collectedArticleIds);
                })
                ->take($limitPerCategory);

            foreach ($articles as $article) {
                $collectedArticleIds[] = $article->id;
            }

            if ($articles->isNotEmpty()) {
                $result[$category->id] = [
                    'category' => $category,
                    'articles' => $articles,
                ];
            }
        }

        return $result;
    }
}

if (! function_exists('getFeaturedArticle')) {
    function getFeaturedArticle()
    {
        return Article::published()->where('featured', true)->inRandomOrder()->paginate(10);
    }
}

if (! function_exists('translation')) {
    function translation($key, $locale = null)
    {
        $locale      = $locale ?: App::getLocale();
        $translation = Translation::where('key', $key)
            ->where('locale', $locale)
            ->value('value');
        // if (is_null($translation) || $locale != "en") {
        if (is_null($translation)) {
            Translation::create([
                'key'    => $key,
                'locale' => $locale,
                'value'  => $key,
            ]);
            return $key;
        } else {
            return $translation;
        }

    }
}

if (! function_exists('contentTranslation')) {
    function contentTranslation($key, $defaultValue, $locale = null)
    {
        $locale = $locale ?: App::getLocale();

        $translation = Translation::firstOrCreate(
            ['key' => 'content_' . $key, 'locale' => $locale],
            ['value' => $defaultValue]
        );

        return $translation->value ?? $defaultValue;
    }
}

if (! function_exists('saveImage')) {
    function saveImage(UploadedFile $file, string $path, string $disk = 'public'): string
    {
        return $file->store($path, $disk);
    }
}

if (! function_exists('saveSetting')) {
    function saveSetting(string $key, mixed $value): void
    {
        Setting::updateOrCreate(
            ['key_name' => $key],
            ['value' => $value]
        );
    }
}

if (! function_exists('getSetting')) {
    function getSetting(string $key, $default = null): mixed
    {
        $setting = Setting::where('key_name', $key)->first();

        return $setting ? $setting->value : $default;
    }
}

if (! function_exists('getHeroProjects')) {
    function getHeroProjects(): \Illuminate\Support\Collection
    {
        $projects = collect();

        for ($i = 1; $i <= 5; $i++) {
            $key       = "hero_project_$i";
            $projectId = getSetting($key);

            if ($projectId) {
                $project = Article::published()->with(['images', 'categories'])->find($projectId);
                if ($project) {
                    $projects->put($key, $project);
                }
            }
        }

        return $projects;
    }
}

if (! function_exists('getActiveCurrency')) {
    function getActiveCurrency()
    {
        return Currency::active()->get();
    }
}

if (! function_exists('getCurrency')) {
    function getCurrency()
    {
        return Currency::get();
    }
}

if (! function_exists('convert_currency')) {
    function convert_currency($amount)
    {
        return Currency::convert($amount);
    }
}

if (! function_exists('format_currency')) {
    function format_currency($amount)
    {
        return Currency::format($amount);
    }
}

function getWeeklyMessagesCount(): int
{
    return Donation::whereNotNull('message')
        ->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])
        ->count();
}

function getWeeklyDonationTotal(): float
{
    return Donation::whereBetween('created_at', [
        Carbon::now()->startOfWeek(),
        Carbon::now()->endOfWeek(),
    ])
        ->count();
}
