<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function users()
    {
        return view('admin.users', [
            "title" => "Users",
            "users" => User::all()
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => ["required", "min:2", "max:100"],
            "email" => ["required", "email", "max:255"],
            "password" => ["required", "min:6", "max:255"]
        ]);

        $validated["password"] = bcrypt($validated["password"]);

        User::create($validated);

        return redirect()->intended('/dashboard/users');
    }

    public function delete(User $user)
    {
        $user->delete();
        return back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
