<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;

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
    return view('home.index');
});

Route::get('/home', function () {
    return view('home.index');
});

Route::resource('questions' ,  QuestionController::class)->middleware('auth');
Route::resource('statistics' ,  StatisticsController::class)->middleware('auth');

Route::get('/questions/x/edit', function () {
    return view('questions.edit');
});

Auth::routes();
