@extends('layouts.main')

@section('title', 'Show Post')

@section('content')
    <div class="container mt-5">
        <h1>Show Post</h1>
        <div class="card">
            <div class="card-body">
                <p class="card-text"><strong>ID:</strong> {{ $post->id }}</p>
                <p class="card-text"><strong>Title:</strong> {{ $post->title }}</p>
                <p class="card-text"><strong>Body:</strong> {{ $post->body }}</p>
                <p class="card-text"><strong>Enabled:</strong> {{ $post->enabled }}</p>
                <p class="card-text"><strong>Published At:</strong> {{ $post->published_at }}</p>
            </div>
        </div>
    </div>
@endsection
