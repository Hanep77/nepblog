<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index']);

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/attempt', [AuthController::class, 'attempt'])->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'index']);
    Route::get('/dashboard/users', [AuthController::class, 'users']);
    Route::get('/dashboard/posts', [PostController::class, 'dashboardPosts']);
    Route::get('/dashboard/posts/create', [PostController::class, 'create']);
    Route::get('/dashboard/register', [AuthController::class, 'register']);
    Route::post('/dashboard/auth/store', [AuthController::class, 'store']);
    Route::delete('/dashboard/auth/delete/{user}', [AuthController::class, 'delete']);
    Route::get('/dashboard/categories', [CategoryController::class, 'dashboardCategories']);
    Route::get('/dashboard/categories/create', [CategoryController::class, 'create']);
    Route::post('/dashboard/categories/store', [CategoryController::class, 'store']);
    Route::delete('/dashboard/categories/{category:slug}', [CategoryController::class, 'delete']);
    Route::delete('/logout', [AuthController::class, 'logout']);
});

Route::get('/posts/categories', [CategoryController::class, 'index']);
Route::get('/posts/categories/{category:slug}', [CategoryController::class, 'show']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
