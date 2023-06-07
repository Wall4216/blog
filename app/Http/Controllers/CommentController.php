<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string',
        ]);

        $validatedData['user_id'] = auth()->user()->id; // Установка user_id

        $comment = Comment::create($validatedData);

        return redirect()->back()->with('success', 'Comment created');
    }


    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($validatedData);

        return redirect()->route('posts.show', $comment->post_id)->with('success', 'Comment updated');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted');
    }

}
