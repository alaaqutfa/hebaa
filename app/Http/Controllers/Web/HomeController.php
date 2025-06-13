<?php
namespace App\Http\Controllers\Web;

use App\Models\DonationCampaign;

class HomeController
{
    public function index()
    {
        $heroProjects = getHeroProjects();
        $featured     = getFeaturedArticle();
        $categories     = getCategory();

        $activeCampaigns = DonationCampaign::where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('end_date')
                  ->orWhere('end_date', '>', now());
            })
            ->orderBy('start_date', 'desc')
            ->paginate(9);
        return view("web.home", compact("heroProjects", "featured","categories","activeCampaigns"));
    }
}
