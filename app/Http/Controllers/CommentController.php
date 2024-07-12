<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::all();

        return view('comments.index', compact('comments'));
    }
    public function create($postId)
    {
        $post = Post::findOrFail($postId);
        return view('comments.create', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|string',
        ]);

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.index')->with('success', 'Comment added successfully.');
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->get();

        return view('comments.show', compact('post', 'comments'));
    }
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());

        return redirect()->route('posts.index')
                         ->with('success', 'Comment updated successfully.');
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('posts.index')
                         ->with('success', 'Comment deleted successfully.');
    }
}
