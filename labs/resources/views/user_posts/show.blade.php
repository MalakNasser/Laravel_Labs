<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Post</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Show Post</h1>
        <div class="card">
            <div class="card-body">
                <p class="card-text"><strong>ID:</strong> {{ $post->id }}</p>
                <p class="card-text"><strong>Title:</strong> {{ $post->title }}</p>
                <p class="card-text"><strong>Enabled:</strong> {{ $post->enabled }}</p>
                <p class="card-text"><strong>Published At:</strong> {{ $post->published_at }}</p>
            </div>
        </div>
    </div>
</body>

</html>
