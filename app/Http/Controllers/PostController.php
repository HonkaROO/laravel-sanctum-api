<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.create')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return $post->load('user', 'comments');
    }

    public function update(Request $request, Post $post)
    {

        $this->authorize('update', $post);

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'body' => 'sometimes|string',
        ]);

        $post->update($request->only('title', 'body'));

        return response()->json($post);
    }
    
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        
        $post->delete();

        return response()->json(null, 204);
    }
}
