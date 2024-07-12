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
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
