@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                <a href="{{ route('posts.index') }}" class="btn btn-primary">Show Posts</a>
                <a href="{{ route('posts.create') }}" class="btn btn-secondary">Create Post</a>
            </div>
        </div>
    </div>
</div>
@endsection
