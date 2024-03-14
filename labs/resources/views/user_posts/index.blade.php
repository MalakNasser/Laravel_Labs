<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            width: 90%;
            margin-top: 20px;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .thead-dark th {
            color: #fff;
            background-color: #343a40;
            border-color: #454d55;
        }

        .btn {
            margin-right: 5px;
        }

        .table-header-actions {
            text-align: right;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="table-header-actions">
            <a href="{{ route('posts.trash') }}" class="btn btn-sm btn-secondary" id="show-deleted">Show Deleted</a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Enabled</th>
                    <th>Published At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->enabled }}</td>
                        <td>{{ $post->published_at }}</td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm delete-post"
                                data-post-id="{{ $post->id }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var deleteButtons = document.querySelectorAll('.delete-post');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var postId = this.getAttribute('data-post-id');
                    if (confirm('Are you sure you want to delete this post?')) {
                        this.closest('tr').remove();
                    }
                });
            });
        });
    </script>
</body>

</html>
