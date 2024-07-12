@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Edit Post
            </div>
            <div class="card-body">
                <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="body">Content</label>
                        <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body', $post->body) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Post</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
