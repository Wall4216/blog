<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    .post {
        margin-bottom: 10px;
        padding: 10px;
        background-color: rgb(31, 41, 55);
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        color: #ffffff;
    }
    .delete-form {
        display: inline;
        margin-left: 10px;
    }
    .post-image {
        max-width: 200px;
        max-height: 200px;
        margin-bottom: 10px;
    }
    /* Laravel Breeze styles */
    .navbar-light {
        background-color: rgb(31, 41, 55) !important;
        width: 100%;
    }
    .navbar-light .navbar-brand {
        color: #ffffff;
        font-family: 'Arial', sans-serif;
        font-size: 24px;
    }
    .navbar-light .navbar-brand:hover,
    .navbar-light .navbar-brand:focus {
        color: #ffffff;
    }
    .navbar-light .navbar-nav .nav-link {
        color: #ffffff;
        font-family: 'Arial', sans-serif;
        font-size: 16px;
    }
    .navbar-light .navbar-nav .nav-link:hover,
    .navbar-light .navbar-nav .nav-link:focus {
        color: #ffffff;
        background-color: rgba(255, 255, 255, 0.1);
    }
    .bg-dark {
        background-color: #1a202c;
    }
    .text-white {
        color: #ffffff !important;
    }
    body {
        background-color: rgb(17, 24, 39);
    }
    .hand {
        color: rgb(229, 231, 235);
        display: inline-flex;
        align-items: center;
        padding-left: 1px;
        padding-top: 1px;
        border-bottom: 2px solid #6366F1;
        border-color: #6366F1;
        border-bottom-width: 2px;
        border-bottom-color: #6366F1;
        text-size: small;
        font-weight: 500;
        line-height: 1.25;
        color: #374151;
        outline: none;
        transition: border-color 0.15s ease-in-out;
    }

    .comment-content {
        color: #ffffff;
        margin-bottom: 5px;
    }
    .comment-date {
        color: #8d8d8d;
        font-size: 12px;
    }
    .comment-form {
        margin-top: 10px;
    }
    .comment-form textarea {
        width: 100%;
        resize: vertical;
        padding: 5px;
    }
    .comment-form button {
        background-color: #6366F1;
        color: #ffffff;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        cursor: pointer;
    }
    .comment-form button:hover {
        background-color: #4F46E5;
    }
</style>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand hand" href="{{ route('dashboard') }}">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            </ul>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h1 style="color: #f9fafb">Posts</h1>
            @foreach($posts as $post)
                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->description }}</p>
                    <img class="post-image" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                    <h4>Comments</h4>
                    <div class="comment-container">
                        @foreach($post->comments as $comment)
                            <div class="comment">
                                <p class="comment-content">{{ $comment->content }}</p>
                                <p class="comment-date">{{ $comment->created_at->format('Y-m-d H:i:s') }}</p>
                            </div>
                        @endforeach
                    </div>
                    <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea name="content" rows="3" placeholder="Enter your comment"></textarea>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}" type="module"></script>
</body>
</html>
