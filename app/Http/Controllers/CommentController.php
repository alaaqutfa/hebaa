<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'article_id' => 'required|exists:articles,id',
            'comment'    => 'required|string',
            'name'       => 'nullable|string|max:255',
            'email'      => 'nullable|email|max:255',
        ]);

        $comment = Comment::create([
            'article_id' => $validated['article_id'],
            'user_id'    => Auth::id(),
            'name'       => Auth::check() ? Auth::user()->name : $validated['name'],
            'email'      => Auth::check() ? Auth::user()->email : $validated['email'],
            'comment'    => $validated['comment'],
        ]);

        return back()->with('success', 'The comment has been sent successfully.');
    }

    public function update(Request $request, Comment $comment)
    {
        if (Auth::id() !== $comment->user_id) {
            abort(403, 'You are not allowed to edit this comment.');
        }

        $validated = $request->validate([
            'comment' => 'required|string',
        ]);

        $comment->update([
            'comment' => $validated['comment'],
        ]);

        return back()->with('success', 'The comment has been successfully updated.');
    }

    public function destroy(Comment $comment)
    {
        if (Auth::id() !== $comment->user_id) {
            abort(403, 'You are not allowed to delete this comment.');
        }

        $comment->delete();

        return back()->with('success', 'The comment has been deleted.');
    }
}
