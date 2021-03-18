<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::get('/profiles/{id}/products', [ProfileController::class, 'showUsage']);
Route::get('/profiles/{id}', [ProfileController::class, 'show']);
Route::get('/profiles', [ProfileController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
