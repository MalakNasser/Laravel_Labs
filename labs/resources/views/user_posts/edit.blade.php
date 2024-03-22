<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .container {
        margin-top: 3px;
    }
</style>

<body>
    @extends('layouts.main')

    @section('title', 'Edit Post')

    @section('content')
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1>Edit Post</h1>

                    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $post->title) }}" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" rows="5"
                                required>{{ old('body', $post->body) }}</textarea>
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <input type="datetime-local" name="published_at" value="{{ now()->format('Y-m-d\TH:i') }}" hidden>

                        <input type="hidden" class="form-control" name="user_id" value="{{ $post->user->id }}">

                        <div class="form-group">
                            <div class="form-check">
                                <input type="hidden" name="enabled" value="0">
                                <input class="form-check-input" type="checkbox" value="1" name="enabled" id="enabled"
                                    {{ old('enabled') == '1' || $post->enabled ? 'checked' : '' }} value=1>

                                <label class="form-check-label" for="enabled">Enabled</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="post-image">Image</label>
                            <input type="file" id="post-image" name="image"
                                class="form-control-file @error('image') is-invalid @enderror" value="{{ $post->image }}">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
