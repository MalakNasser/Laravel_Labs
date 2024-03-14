<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate();
        return view('user_posts.index', ['posts' => $posts]);
    }

    public function show(string $id)
    {
        $post = Post::find($id);
        return view('user_posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('user_posts.create');
    }

    public function store(Request $request)
    {
        $post = new \App\Models\Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->enabled = $request->enabled;
        $post->published_at = $request->published_at;
        $post->save();
    }

    public function edit(string $id)
    {
        $post = \App\Models\Post::find($id);
        return view('user_posts.edit', ['post' => $post]);
    }

    public function update(Request $request, string $id)
    {
        return "Update the specified resource with id {id}
        in storage.";
    }

    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return view('user_posts.show', ['post' => $post]);
    }

    public function showTrash()
    {
        $deletedPosts = Post::onlyTrashed()->paginate(10);
        return view('user_posts.trash', ['deletedPosts' => $deletedPosts]);
    }
}
