<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;

class PostsController
{
    public function createPost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $user = Auth::user();

        if ($user->id != $request->user_id) {
            return response()->json(['error' => 'Unauthorized' . $user->id], 403);
        }

        $post = Posts::create([
            'user_id' => $user->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        return redirect()->route('posts.all');

    }

    public function getAllPosts()
    {
        $posts = Posts::all();
        return response()->view('posts', ['posts' => $posts]);
    }

    public function getPostById($id)
    {
        $post = Posts::find($id);
        if (!$post) {
            return response()->json(['error' => 'Post não encontrado'], 404);
        }
        return response()->json($post);
    }

    public function updatePost(Request $request, $id)
    {
        $post = Posts::find($id);
        if (!$post) {
            return response()->json(['error' => 'Post não encontrado'], 404);
        }

        $user = Auth::user();
        if ($user->id !== $post->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);

        if ($request->has('title')) {
            $post->title = $request->title;
        }
        if ($request->has('content')) {
            $post->content = $request->content;
        }
        $post->save();

        return response()->json(['success' => 'Post atualizado com sucesso!']);
    }

    public function deletePost($id)
    {
        $post = Posts::find($id);
        if (!$post) {
            return response()->json(['error' => 'Post não encontrado'], 404);
        }

        $user = Auth::user();
        if ($user->id !== $post->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $post->delete();
        return response()->json(['success' => 'Post deletado com sucesso!']);
    }
}
