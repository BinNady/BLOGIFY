<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $post->comments()->create([
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        return back();
    }

    public function destroy(Comment $comment)
    {
    
    if (Auth::id() !== $comment->user_id)
        {
        abort(403, 'Unauthorized');
        }

    $comment->delete();

    return back()->with('success', 'Comment deleted successfully.');
    }

}