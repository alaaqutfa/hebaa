<?php
namespace App\Http\Controllers\Web;

use App\Models\Category;

class CategoryController
{
    public function show(Category $category)
    {
        $projects = $category->articles()->with(['images', 'categories'])->latest()->get();
        return view('web.categories.show', compact('category', 'projects'));
    }
}
