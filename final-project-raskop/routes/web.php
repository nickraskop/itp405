<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/', [HomeController::class, 'index'])->name('home.index');


Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::get('/register', [RegisterController::class, 'index'])->name('registration.index');
Route::post('/register', [RegisterController::class, 'register'])->name('registration.create');

Route::resource('profilePics', 'App\Http\Controllers\ProfilePicController');

Route::get('/new_post', [PostController::class, 'create'])->name('post.create');
Route::post('/store_post', [PostController::class, 'store'])->name('post.store');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');


Route::post('comments/store/{id}', [CommentController::class, 'store'])->name('comment.store');

Route::get('followers/{id}', [FollowController::class, 'followers'])->name('follow.followers');
Route::get('following/{id}', [FollowController::class, 'following'])->name('follow.following');
use Illuminate\Support\Facades\URL;

// your routes

if (env('APP_ENV') !== 'local') {
    URL::forceScheme('https');
}