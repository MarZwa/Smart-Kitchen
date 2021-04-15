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

// General


// Cleaning Subsystem
Route::get('/cleaning', [App\Http\Controllers\CleaningLogController::class, 'index']);

// Cleaning Subsystem -> User page
// Route::post('cleaning/users/{id}', );
