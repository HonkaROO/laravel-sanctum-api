@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Posts</h1>
        @foreach($posts as $post)
            <div class="card mt-3">
                <div class="card-header">{{ $post->title }}</div>
                <div class="card-body">{{ $post->body }}</div>
            </div>
        @endforeach
    </div>
</div>
@endsection
