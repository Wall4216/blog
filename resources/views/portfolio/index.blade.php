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
</style>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Portfolio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('projects') }}">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h1>Welcome to My Portfolio</h1>
            <p>This is a showcase of my work and projects.</p>
            <p>Feel free to explore and get in touch.</p>
        </div>
    </div>
</div>

<script  src="{{ asset('js/app.js') }}" type="module"></script>
</body>
</html>
