<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\URL;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/albums', [AlbumController::class, 'index'])->name('album.index');
});

Route::get('/albums/new', [AlbumController::class, 'create'])->name('album.create');
Route::post('/albums', [AlbumController::class, 'store'])->name('album.store');
Route::get('/albums/{id}/edit', [AlbumController::class, 'edit'])->name('album.edit');
Route::post('/albums/{id}', [AlbumController::class, 'update'])->name('album.update');

Route::get('/register', [RegisterController::class, 'index'])->name('registration.index');
Route::post('/register', [RegisterController::class, 'register'])->name('registration.create');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');


if (env('APP_ENV') !== 'local') {
    URL::forceScheme('https');
}