<!DOCTYPE html>
<html>
<head>
    <title>Blog - Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Create Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/posts" class="mt-4">
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

