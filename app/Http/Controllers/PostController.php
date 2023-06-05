<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $userIsAdmin = auth()->check() && auth()->user()->is_admin; // Проверяем, является ли пользователь администратором

        $posts = Post::all();
        return view('posts.index', compact('posts', 'userIsAdmin')); // Передаем переменную $userIsAdmin в представление
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Проверка на тип и размер изображения
        ]);

        if (auth()->check() && auth()->user()->is_admin) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('images', 'public'); // Сохранение изображения в папке storage/app/public/images
                $validatedData['image'] = $imagePath;
            }

            Post::create($validatedData);
            return redirect('/posts')->with('success', 'Post created');
        }

        return redirect('/posts')->with('error', 'You are not authorized to create a post.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Проверяем разрешение на обновление поста
        $this->authorize('update', $post);

        // Валидация данных
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Обновление поста
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];

        if ($request->hasFile('image')) {
            // Загрузка и сохранение нового изображения
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Получаем текущего пользователя
        $user = auth()->user();

        // Проверяем разрешение на удаление поста

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Пост успешно удален');
    }

}
