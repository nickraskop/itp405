<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaintenanceController;

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

Route::get('/hi', function () {
    return view('welcome');
});

Route::middleware (['maintenance-mode'])->group(function() {
    Route::get('/maintenance', [MaintenanceController::class, 'index'])->name('maintenance.index');
});
