@extends('layouts.app')

@section('title', 'Show Posts')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Posts</span>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">Go Back to Dashboard</a>
            </div>
            <div class="card-body">
                @if ($posts->isEmpty())
                    <p>No posts available.</p>
                @else
                    <ul class="list-group">
                        @foreach ($posts as $post)
                            <li class="list-group-item">
                                <div>
                                    <h5>{{ $post->title }}</h5>
                                    <p>{{ $post->body }}</p>
                                    <small>By: {{ $post->user->name }}</small>
                                </div>
                                <div class="mt-3">
                                    <a href="{{ route('comments.create', $post->id) }}" class="btn btn-primary btn-sm ml-2">Create Comment</a>
                                    <span class="badge badge-info ml-2">{{ $post->comments->count() }} {{ Str::plural('comment', $post->comments->count()) }}</span>
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
