<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ShelfController;
use \App\Http\Controllers\GroceryController;

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

Route::get('/users', [ShelfController::class, 'index']);
Route::get('/users/{id}', [ShelfController::class, 'show']);
Route::get('/users/{id}/grocerylist', [ShelfController::class, 'grocery']);
Route::get('/users/{id}/storagelist', [ShelfController::class, 'storage']);
Route::get('/rfid', [ShelfController::class, 'show']);

Route::get('/', function () {
    return view('welcome');
});
