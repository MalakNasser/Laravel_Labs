@extends('layouts.main')

@section('title', 'Create Post')

@section('content')
    <div class="container mt-5">
        <h1>Create Post</h1>
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    required value="{{ old('title') }}">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" rows="5"
                    required>{{ old('body') }}</textarea>
                @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <input type="datetime-local" name="published_at" value="{{ now()->format('Y-m-d\TH:i') }}" hidden>

            <div class="form-group">
                <label for="user_id">Select User</label>
                <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                    <option value="" disabled selected>Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input type="hidden" name="enabled" value="0">
                    <input class="form-check-input" type="checkbox" value="1" name="enabled" id="enabled"
                        {{ old('enabled') == '1' ? 'checked' : '' }} value=1>

                    <label class="form-check-label" for="enabled">Enabled</label>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
