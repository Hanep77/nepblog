<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.home', [
            "title" => "Home"
        ]);
    }

    public function profile()
    {
        return view('admin.profile', [
            "title" => "Profile"
        ]);
    }

    public function login()
    {
    }

    public function attempt()
    {
    }

    public function register()
    {
        return view('admin.register', [
            "title" => "Register"
        ]);
    }

    public function store()
    {
    }

    public function logout()
    {
    }
}
