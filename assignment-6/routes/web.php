<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/secret', [MaintenanceController::class, 'secret'])->name('maintenance.edit');
Route::post('/update', [MaintenanceController::class, 'update'])->name('maintenance.update');


Route::middleware (['maintenance-mode'])->group(function() {
    Route::get('/maintenance', [MaintenanceController::class, 'index'])->name('maintenance.index');
    Route::get('/test', [MaintenanceController::class, 'test'])->name('maintenance.test');
});

if (env('APP_ENV') !== 'local') {
    URL::forceScheme('https');
}
