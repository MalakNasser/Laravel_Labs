@extends('layouts.main')

@section('title', 'Show Post')

@section('content')
    <div class="container mt-5">
        <h1>Show Post</h1>
        <div class="card mb-4" style="max-width: 75%; margin: 0 auto; margin-bottom: 20px;">
            <div class="card-body">
                <p class="card-text"><strong>ID:</strong> {{ $post->id }}</p>
                <p class="card-text"><strong>Title:</strong> {{ $post->title }}</p>
                @isset($post->image)
                    <div class="img-fluid">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-thumbnail"
                            style="width: 100%; height: auto;">
                    </div>
                @endisset
                <p class="card-text"><strong>Body:</strong> {{ $post->body }}</p>
                <p class="card-text"><strong>Enabled:</strong> {{ $post->enabled ? 'yes' : 'No' }}</p>
                <p class="card-text"><strong>Published At:</strong> {{ $post->published_at }}</p>
            </div>
        </div>
    </div>
@endsection
