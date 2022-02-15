<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaylistController;
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

Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlist.index');

Route::get('/playlists/{id}', [PlaylistController::class, 'show'])->name('playlist.show');

if (env('APP_ENV') !== 'local') {
    URL::forceScheme('https');
}
