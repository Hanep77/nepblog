<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Rules\WithoutSpace;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories', [
            "title" => "All Categories",
            "categories" => Category::all()
        ]);
    }

    public function show(Category $category)
    {
        return view('index', [
            "title" => $category->name,
            "posts" => $category->posts
        ]);
    }

    public function create()
    {
        return view('admin.createcategory', [
            "title" => "Create Category"
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => ["required"],
            "slug" => ["required", new WithoutSpace]
        ]);

        Category::create($validated);

        return redirect()->intended('/dashboard/categories');
    }

    public function update()
    {
    }

    public function delete(Category $category)
    {
        $category->delete();
        return back();
    }

    public function dashboardCategories()
    {
        return view('admin.categories', [
            "title" => "Categories",
            "categories" => Category::all()
        ]);
    }
}
