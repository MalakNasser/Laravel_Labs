<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePost;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('user_posts.index', ['posts' => $posts]);
    }

    public function show(string $id)
    {
        $post = Post::find($id);
        return view('user_posts.show', ['post' => $post]);
    }

    public function create()
    {
        $users = User::all();
        return view('user_posts.create', ['users' => $users]);
    }

    public function store(StorePost $request)
    {
        $post = Post::create($request->validated());
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }


    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('user_posts.edit', ['post' => $post]);
    }

    public function update(StorePost $request, string $id)
    {
        $post = Post::find($id);
        $post->update($request->validated());
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function showTrash()
    {
        $deletedPosts = Post::onlyTrashed()->paginate(10);
        return view('user_posts.trash', ['deletedPosts' => $deletedPosts]);
    }
}
