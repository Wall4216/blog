<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
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
    <h1 class="mt-4">Blog</h1>

    <a href="/posts/create" class="btn btn-primary my-3">Create New Post</a>

    <div class="row">
        <div class="col-md-8">
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
        <div class="col-md-4">
            <h4>Create Post</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/posts">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <textarea id="content" name="content" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
