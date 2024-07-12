@extends('layouts.app')

@section('title', 'Edit Comment')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Comment</div>
            <div class="card-body">
                <form method="POST" action="{{ route('comments.update', ['post' => $post->id, 'comment' => $comment->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="body">Comment</label>
                        <textarea class="form-control" id="body" name="body" rows="5" required>{{ $comment->body }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Comment</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
