@extends('layouts.main')

@section('title', 'Posts')

@section('content')
    <div class="row align-items-center mt-5">
        <div class="col-md-9">
            <h2 class="d-inline-block mr-3">Posts</h2>
        </div>
        <div class="col-md-3 text-right">
            <a href="{{ route('posts.trash') }}" class="btn btn-sm btn-secondary" id="show-deleted">Show Deleted</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>User</th>
                        <th>Enabled</th>
                        <th>Published At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr id="post_{{ $post->id }}">
                            <td>{{ $post->id }}</td>
                            <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->enabled ? 'Yes' : 'No' }}</td>
                            <td>{{ $post->published_at }}</td>
                            <td>
                                @if ($post->user_id == Auth::id())
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm delete-post"
                                        data-post-id="{{ $post->id }}">Delete</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row justify-content-center">
                <div class="col-lg-12 offset-10">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var deleteButtons = document.querySelectorAll('.delete-post');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var postId = this.getAttribute('data-post-id');
                    if (confirm('Are you sure you want to delete this post?')) {
                        fetch(`/posts/${postId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            })
                            .then(response => {
                                if (response.ok) {
                                    document.getElementById(`post_${postId}`).remove();
                                } else {
                                    console.error('Error deleting post.');
                                }
                            })
                            .catch(error => {
                                console.error('Error deleting post:', error);
                            });
                    }
                });
            });
        });
    </script>
@endsection
