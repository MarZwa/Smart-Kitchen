<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Models\User;

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

Route::get('/', [UsersController::class, 'index']);
Route::get('/users', [UsersController::class, 'index']);
Route::get('/users/{id}', [UsersController::class, 'show']);
Route::get('/users/{id}/products', [UsersController::class, 'showUsage']);
Route::get('/users/{id}/update', [UsersController::class, 'update']);
Route::get('/user/{id}/edit', [UsersController::class, 'edit']);
Route::patch('/user/{id}/update', [UsersController::class, 'update']);