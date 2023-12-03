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
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/dashboard', [AuthController::class, 'index']);
Route::get('/dashboard/profile', [AuthController::class, 'profile']);
Route::get('/dashboard/posts', [PostController::class, 'dashboardPosts']);
Route::get('/dashboard/posts/create', [PostController::class, 'create']);
Route::get('/dashboard/register', [AuthController::class, 'register']);
Route::get('/dashboard/categories', [CategoryController::class, 'dashboardCategories']);
Route::get('/dashboard/categories/create', [CategoryController::class, 'create']);
