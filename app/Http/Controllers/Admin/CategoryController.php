<?php
namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController
{
    public function index()
    {
        $categories = Category::all();
        return view("admin.categories.index", compact("categories"));
    }

    public function create()
    {
        return view("admin.categories.add");
    }

    public function store(Request $request)
    {
        $category       = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect()->route("admin.categories.index")->with("message", "The category has been added successfully.");
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view("admin.categories.show", compact("category"));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view("admin.categories.edit", compact("category"));
    }

    public function update(Request $request, $id)
    {
        $category       = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect()->route("admin.categories.index")->with("message", "The category has been successfully modified.");
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route("admin.categories.index")->with("message", "The category has been deleted.");
    }
}
