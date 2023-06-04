<!DOCTYPE html>
<html>
<head>
    <title>Blog - Posts</title>
    <style>
        .post {
            margin-bottom: 10px;
        }
        .delete-form {
            display: inline;
            margin-left: 10px;
        }
    </style>
</head>
<body>
<h1>Blog - Posts</h1>

<a href="/posts/create">Create New Post</a>

<ul>
    @foreach ($posts as $post)
        <li class="post">
            {{ $post->title }}
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>
