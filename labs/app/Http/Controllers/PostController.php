<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePost;
use Illuminate\Support\Facades\Auth;

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
        $data = $request->validated();
        $data['user_id'] = Auth()->id();

        $imagePath = null;
        if ($request->has('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('posts', ['disk' => 'public']);
        }
        $data['image'] = $imagePath;
        $post = Post::create($data);
        return redirect()->route('posts.show', ['id' => $post->id])->with(['post' => $post]);
    }


    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('user_posts.edit', ['post' => $post]);
    }

    public function update(StorePost $request, string $id)
    {
        $post = Post::find($id);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('posts', ['disk' => 'public']);
            $post['image'] = $imagePath;
        }

        $post->update($request->only('title', 'body', 'enabled'));

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
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
