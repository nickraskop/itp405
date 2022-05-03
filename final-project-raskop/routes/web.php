<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\FavoriteController;

use Illuminate\Support\Facades\URL;

// your routes

if (env('APP_ENV') !== 'local') {
    URL::forceScheme('https');
}

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

// Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile_edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile_edit', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/', [HomeController::class, 'index'])->name('home.index');


Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::get('/register', [RegisterController::class, 'index'])->name('registration.index');
Route::post('/register', [RegisterController::class, 'register'])->name('registration.create');

Route::get('/new_post', [PostController::class, 'create'])->name('post.create');
Route::post('/store_post', [PostController::class, 'store'])->name('post.store');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');


Route::post('comments/store/{id}', [CommentController::class, 'store'])->name('comment.store');

Route::get('/followers/{id}', [FollowController::class, 'followers'])->name('follow.followers');
Route::get('/following/{id}', [FollowController::class, 'following'])->name('follow.following');
Route::post('/follow/{id}', [FollowController::class, 'follow'])->name('follow.follow');
Route::post('/unfollow/{id}/{from}', [FollowController::class, 'unfollow'])->name('follow.unfollow');
Route::post('/followP/{id}', [FollowController::class, 'followFromProfile'])->name('follow.followFromProfile');

Route::post('/favorite/{id}', [FavoriteController::class, 'favorite'])->name('favorite.favorite');
Route::post('/unfavorite/{id}', [FavoriteController::class, 'unfavorite'])->name('favorite.unfavorite');
Route::get('/favorites/{id}', [FavoriteController::class, 'index'])->name('favorite.index');