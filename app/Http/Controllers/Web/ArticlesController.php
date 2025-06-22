<?php
namespace App\Http\Controllers\Web;

use App\Models\Article;
use App\Models\DonationCampaign;

class ArticlesController
{
    public function show(Article $article)
    {
        $project = $article->load(['categories', 'images']);
        $comments = $article->comments()->paginate(10);
        $recent  = getRecentArticlesForSelectedCategories($project->categories,$project->id);
        $recentDonationCampaign = DonationCampaign::orderBy('start_date', 'desc')->get()->take(5);
        return view('web.articles.show', compact('project','comments', 'recent', 'recentDonationCampaign'));
    }
}
