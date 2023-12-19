<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Rules\WithoutSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            "slug" => ["required", "unique:posts", new WithoutSpace],
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

    public function edit(Post $post)
    {
        return view('admin.update', [
            "title" => 'Edit Post',
            "post" => $post,
            "categories" => Category::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            "category_id" => ["required"],
            "image" => ["image", "max:4096"],
            "content" => ["required"]
        ];

        if ($request->title != $post->title) {
            $rules["title"] = ["required", "unique:posts"];
        }

        if ($request->slug != $post->slug) {
            $rules["slug"] = ["required", "unique:posts", new WithoutSpace];
        }

        $validated = $request->validate($rules);

        if ($post->image && $request->image) {
            Storage::delete($post->image);
        }

        if ($request->image) {
            $validated["image"] = $request->file('image')->store();
        }

        $validated["user_id"] = auth()->user()->id;

        $post->update($validated);
        return redirect('/dashboard/posts')->with('success', 'Postingan berhasil diubah');
    }

    public function delete(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }
        $post->delete();
        return back();
    }

    public function dashboardPosts()
    {
        return view('admin.posts', [
            "title" => "Posts",
            "posts" => Post::with('category')->get()
        ]);
    }
}
