<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('login');
    }

    public function attempt(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email or Password not Correct',
        ])->onlyInput('email');
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
        Auth::logout();

        return redirect('/');
    }
}
