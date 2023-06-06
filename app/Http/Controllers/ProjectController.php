<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('portfolio.index', compact('projects')); // Передаем переменную $userIsAdmin в представление
    }

    public function create()
    {
        return view('portfolio.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Проверка на тип и размер изображения
        ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('images', 'public'); // Сохранение изображения в папке storage/app/public/images
                $validatedData['image'] = $imagePath;
            }

            Project::create($validatedData);
            return redirect('/portfolio')->with('success', 'Project created');

    }

    public function edit($id)
    {
        $post = Project::findOrFail($id);
        return view('portfolio.edit', compact('post'));
    }

    public function update(Request $request, Project $post)
    {
        // Проверяем разрешение на обновление поста
        $this->authorize('update', $post);

        // Валидация данных
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Обновление поста
        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            // Загрузка и сохранение нового изображения
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('portfolio.index')->with('success', 'Project updated successfully');
    }

    public function destroy($id)
    {
        $post = Project::findOrFail($id);

        // Получаем текущего пользователя
        $user = auth()->user();

        // Проверяем разрешение на удаление поста

        $post->delete();

        return redirect()->route('portfolio.index')->with('success', 'Пост успешно удален');
    }
}
