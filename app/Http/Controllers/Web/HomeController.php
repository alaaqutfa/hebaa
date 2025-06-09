<?php
namespace App\Http\Controllers\Web;

class HomeController
{
    public function index()
    {
        $heroProjects = getHeroProjects();
        $featured     = getFeaturedArticle();
        $categories     = getCategory();
        return view("web.home", compact("heroProjects", "featured","categories"));
    }
}
