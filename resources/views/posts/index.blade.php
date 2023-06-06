<!DOCTYPE html>
<html>
<head>
    <title>Blog - Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ route('dashboard') }}" style="color: rgb(229, 231, 235); display: inline-flex; align-items: center; padding-left: 1px; padding-top: 1px; border-bottom: 2px solid #6366F1; border-color: #6366F1; border-bottom-width: 2px; border-bottom-color: #6366F1; text-size: small; font-weight: 500; line-height: 1.25; color: #374151; outline: none; transition: border-color 0.15s ease-in-out;">Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                        </li>
                    @else

                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="row justify-content-center text-center">

        <div class="col-md-8">
            <h1 class="text-left" style="color: #f9fafb;">Posts</h1>
            <ul class="list-group">
                @foreach ($posts as $post)
                    <li class="list-group-item post">
                        <div class="d-flex justify-content-between">
                            <h5>{{ $post->title }}</h5>
                            <div>
                                @if (auth()->check() && auth()->user()->is_admin)
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="post-image">
                        @endif
                        <p>{{ $post->description }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
