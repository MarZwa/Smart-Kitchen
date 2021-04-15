<?php

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

Route::get('/foods/{id}', [\App\Http\Controllers\UsersController::class, 'showFoods']);
Route::get('/foods/{id}/daily', [\App\Http\Controllers\UsersController::class, 'showDailyFoods']);
Route::get('/foods/{id}/weekly', [\App\Http\Controllers\UsersController::class, 'showWeeklyFoods']);
