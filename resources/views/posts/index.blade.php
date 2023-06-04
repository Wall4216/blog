<!DOCTYPE html>
<html>
<head>
    <title>Blog - Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .post {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .delete-form {
            display: inline;
            margin-left: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="mt-4">Blog - Posts</h1>

    <a href="/posts/create" class="btn btn-primary my-3">Create New Post</a>

    <ul class="list-group">
        @foreach ($posts as $post)
            <li class="list-group-item post">
                <div class="d-flex justify-content-between">
                    <h5>{{ $post->title }}</h5>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
