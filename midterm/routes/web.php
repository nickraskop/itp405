<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [QuestionController::class, 'index'])->name('question.index');
Route::get('/questions/{id}', [QuestionController::class, 'show'])->name('question.show');
Route::post('/questions/store', [QuestionController::class, 'store'])->name('question.store');

Route::post('answers/store/{id}', [AnswerController::class, 'store'])->name('answer.store');


if (env('APP_ENV') !== 'local') {
    URL::forceScheme('https');
}