@extends('layouts.app')

@section('title', 'Comments')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Comments</span>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">Go Back to Dashboard</a>
            </div>
            <div class="card-body">
                @if ($comments->isEmpty())
                    <p>No comments available.</p>
                @else
                    <ul class="list-group">
                        @foreach ($comments as $comment)
                            <li class="list-group-item">
                                <div>
                                    <h5>{{ $comment->post->title }}</h5>
                                    <p>{{ $comment->body }}</p>
                                    <small>By: {{ $comment->user->name }}</small>
                                </div>
                                <div class="mt-3">
                                    <!-- View Comment Button -->
                                    <a href="{{ route('comments.show', $comment->id) }}" class="btn btn-info btn-sm ml-2">View</a>
                                    
                                    <!-- Edit Comment Button -->
                                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning btn-sm ml-2">Edit</a>
                                    
                                    <!-- Delete Comment Form -->
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
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
