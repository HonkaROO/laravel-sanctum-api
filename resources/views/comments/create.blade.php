@extends('layouts.app')

@section('title', 'Add Comment')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Add Comment</div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('comments.store', ['post' => $post->id]) }}">
                    @csrf

                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    <div class="form-group">
                        <label for="body">Comment</label>
                        <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
