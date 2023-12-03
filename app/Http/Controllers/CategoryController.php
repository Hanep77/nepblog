<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        return view('admin.createcategory', [
            "title" => "Create Category"
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

    public function dashboardCategories()
    {
        return view('admin.categories', [
            "title" => "Categories"
        ]);
    }
}
