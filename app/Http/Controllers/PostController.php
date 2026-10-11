<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
            if (!Auth::check())
            {
                return redirect()->route('login-warning');
            }

        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post = Auth::user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.show', $post);

        //         $request->validate(['title'=>'required','body'=>'required']);
        
        // $post = Post::create([
        //         'user_id' => Auth::id(),
        //         'title' => $request->title,
        //         'body' => $request->body,
        //     ]);

        // return redirect()->route('posts.show', $post);
    }

    public function show(Post $post)
    {
        $post->load('user', 'comments.user');
        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        if (Auth::id() !== $post->user_id)
            {
            abort(403);
            }

        $post->delete();
        return redirect()->route('posts.index');
    }

}

