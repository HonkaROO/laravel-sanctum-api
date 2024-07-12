<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        $comments = $post->comments()->get();
        return view('comments.index', compact('post', 'comments'));
    }

    public function create($postId)
    {
        $post = Post::findOrFail($postId);
        return view('comments.create', compact('post'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'body' => 'required|string',
            'post_id' => 'required|exists:posts,id',
        ]);

        $data['user_id'] = auth()->user()->id;
        Comment::create($data);

        return redirect()->route('comments.index', ['post' => $data['post_id']])
                         ->with('success', 'Comment created successfully.');
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->get();
        return view('comments.show', compact('post', 'comments'));
    }

    public function edit(Post $post, Comment $comment)
{
    $this->authorize('update', $comment);
    return view('comments.edit', compact('post', 'comment'));
}

public function update(Request $request, Post $post, Comment $comment)
{
    $request->validate([
        'body' => 'required|string',
    ]);

    $comment->update([
        'body' => $request->body,
    ]);

    return redirect()->route('comments.index', ['post' => $post->id])
                     ->with('success', 'Comment updated successfully.');
}



    

    public function destroy(Post $post, Comment $comment)
    {
        $this->authorize('delete', $comment); 

        $comment->delete();

        return redirect()->route('posts.index')
                         ->with('success', 'Comment deleted successfully.');
    }
}
