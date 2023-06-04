<!-- resources/views/posts/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Blog - Posts</title>
</head>
<body>
<h1>Blog - Posts</h1>

<a href="/posts/create">Create New Post</a>

<ul>
    @foreach ($posts as $post)
        <li>{{ $post->title }}</li>
    @endforeach
</ul>
</body>
</html>
