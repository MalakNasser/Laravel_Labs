@extends('layouts.main')

@section('title', 'Trash')

@section('content')
    <div class="row mt-5">
        <div class="col-md-8 offset-md-2">
            <h1>Trash</h1>
            @if ($deletedPosts->count() > 0)
                <ul class="list-group">
                    @foreach ($deletedPosts as $post)
                        <li class="list-group-item" id="post_{{ $post->id }}">
                            <h6>{{ $post->title }}</h6>
                            <p>ID: {{ $post->id }}</p>
                            <small>Deleted At: {{ $post->deleted_at }}</small><br>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No posts found in trash.</p>
            @endif
        </div>
    </div>
@endsection
