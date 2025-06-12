<?php
namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticlesController
{
    public function index()
    {
        $articles = Article::with(['categories', 'images'])->latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'content'    => 'required|string',
            'image'      => 'required|image',
            'images.*'   => 'image',
            'categories' => 'array',
            'date'       => 'nullable|date',
        ]);

        $article = Article::create([
            'user_id'      => auth()->id(),
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'content'      => $request->content,
            'image'        => $request->file('image')->store('articles', 'public'),
            'is_published' => $request->has('is_published'),
            'published_at' => $request->has('is_published') ? now() : null,
            'date'         => $request->date('date'),
            'featured'     => $request->has('featured'),
        ]);

        if ($request->filled('categories')) {
            $article->categories()->sync($request->categories);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $article->images()->create([
                    'image' => $img->store('articles/multiple', 'public'),
                ]);
            }
        }

        return redirect()->route('admin.articles.index')->with('message', 'تمت إضافة المشروع بنجاح.');
    }

    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'content'    => 'required|string',
            'image'      => 'nullable|image',
            'images.*'   => 'image',
            'categories' => 'array',
            'date'       => 'nullable|date',
        ]);

        $article->update([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'content'      => $request->content,
            'is_published' => $request->has('is_published'),
            'published_at' => $request->has('is_published') ? now() : null,
            'date'         => $request->date('date'),
            'featured'     => $request->has('featured'),
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($article->image);
            $article->update([
                'image' => $request->file('image')->store('articles', 'public'),
            ]);
        }

        if ($request->filled('categories')) {
            $article->categories()->sync($request->categories);
        }

        if ($request->hasFile('images')) {
            foreach ($article->images as $oldImage) {
                Storage::disk('public')->delete($oldImage->image);
                $oldImage->delete();
            }

            foreach ($request->file('images') as $img) {
                $article->images()->create([
                    'image' => $img->store('articles/multiple', 'public'),
                ]);
            }
        }

        return redirect()->route('admin.articles.index')->with('message', 'تم تعديل المشروع بنجاح.');
    }

    public function destroy(Article $article)
    {
        foreach ($article->images as $image) {
            Storage::disk('public')->delete($image->image);
        }

        Storage::disk('public')->delete($article->image);

        $article->images()->delete();
        $article->categories()->detach();
        $article->delete();

        return redirect()->route('admin.articles.index')->with('message', 'تم حذف المشروع بنجاح.');
    }

    public function toggleFeatured(Article $article)
    {
        $article->update([
            'featured' => ! $article->featured,
        ]);

        return back()->with('success', 'The discrimination status has been updated.');
    }

    public function togglePublished(Article $article)
    {
        $article->update([
            'is_published' => ! $article->is_published,
        ]);

        return back()->with('success', 'The publication status has been updated.');
    }
}
