<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('index', [
            "title" => "Home",
            "posts" => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "post",
            "post" => $post
        ]);
    }

    public function create()
    {
        return view('admin.upload', [
            "title" => "Upload",
            "categories" => Category::all()
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            "title" => ["required", "unique:posts"],
            "slug" => ["required", "unique:posts"],
            "category_id" => ["required"],
            "image" => ["required", "image", "max:4096"],
            "content" => ["required"]
        ]);


        $image = $request->file('image');
        $path = $image->store();

        $validated["image"] = $path;
        $validated["user_id"] = auth()->user()->id;

        Post::create($validated);
        return redirect('/dashboard/posts')->with('success', 'Postingan berhasil ditambahkan');
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    public function dashboardPosts()
    {
        return view('admin.posts', [
            "title" => "Posts",
            "posts" => Post::with('category')->get()
        ]);
    }
}
