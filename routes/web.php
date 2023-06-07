<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CommentController;
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/projects', function () {
    return view('about');
})->name('projects');
Route::get('/contact', function () {
    return view('about');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

        Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::patch('/posts/{id}', [PostController::class, 'update'])->name('posts.update');


        Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/portfolio', [\App\Http\Controllers\ProjectController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/create', [ProjectController::class, 'create'])->name('portfolio.create');
Route::post('/portfolio', [ProjectController::class, 'store'])->name('portfolio.store');
Route::get('/portfolio/{id}/edit', [ProjectController::class, 'edit'])->name('portfolio.edit');
Route::patch('/portfolio/{id}', [ProjectController::class, 'update'])->name('portfolio.update');
Route::delete('/portfolio/{id}', [ProjectController::class, 'destroy'])->name('portfolio.destroy');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::post('/posts/{id}/like', [PostController::class, 'like'])->name('posts.like');

require __DIR__.'/auth.php';

