<?php
namespace App\Http\Controllers\Web;

use App\Models\Article;

class ArticlesController
{
    public function show(Article $article)
    {
        $project = $article->load(['categories', 'images']);
        return view('web.articles.show', compact('project'));
    }
}
