@extends('layouts.app')

@section('title', 'Comments for Post')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Comments for Post: {{ $post->title }}</span>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm">Go Back to Posts</a>
            </div>
            <div class="card-body">
                @if ($comments->isEmpty())
                    <p>No comments available.</p>
                @else
                    <ul class="list-group">
                        @foreach ($comments as $comment)
                            <li class="list-group-item">
                                <p>{{ $comment->body }}</p>
                                <small>By: {{ $comment->user->name }}</small>
                                <br>
                                <div class="mt-2">
                                    <a href="{{ route('comments.edit', ['post' => $post->id, 'comment' => $comment->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('comments.destroy', ['post' => $post->id, 'comment' => $comment->id]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
