<?php
namespace App\Http\Controllers\Admin;

class HomeController
{
    public function index()
    {
        $heroProjects = getHeroProjects();
        return view("admin.home", compact("heroProjects"));
    }
}
