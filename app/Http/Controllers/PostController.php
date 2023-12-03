<?php

namespace App\Http\Controllers;

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
            "title" => "Upload"
        ]);
    }

    public function store()
    {
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
            "title" => "Posts"
        ]);
    }
}
