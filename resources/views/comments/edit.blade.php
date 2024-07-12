@extends('layouts.app')

@section('title', 'Edit Comment')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Edit Comment
            </div>
            <div class="card-body">
                <form action="{{ route('comments.update', ['post' => $comment->post_id, 'comment' => $comment->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="body">Comment</label>
                        <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body', $comment->body) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Comment</button>
                    <a href="{{ route('comments.index', $comment->post_id) }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
