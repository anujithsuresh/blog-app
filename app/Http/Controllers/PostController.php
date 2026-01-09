<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|min:3',
            'content' => 'required',
        ]);

        Auth::user()->posts()->create($request->only('title', 'content'));

        return redirect()->route('posts.index')->with('success', 'Post created!');
    }

    public function edit(Post $post)
    {
        $this->authorizePost($post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorizePost($post);

        $request->validate([
            'title'   => 'required|min:3',
            'content' => 'required',
        ]);

        $post->update($request->only('title', 'content'));

        return redirect()->route('posts.index')->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        $this->authorizePost($post);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted!');
    }

    private function authorizePost(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
