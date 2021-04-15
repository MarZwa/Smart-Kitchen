<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ShelfController;
use \App\Http\Controllers\GroceryController;
use \App\Http\Controllers\StorageController;

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
// Route::get('/users/{id}/grocerylist', [ShelfController::class, 'grocery']);
// Route::get('/users/{id}/storagelist', [ShelfController::class, 'storage']);
Route::get('/rfid', [ShelfController::class, 'show']);

Route::get('/grocerylist', [GroceryController::class, 'grocery']);
Route::get('/storagelist', [StorageController::class, 'storage']); 


Route::delete('/grocery-clear', [GroceryController::class, 'destroyGrocery']);
Route::delete('/storage-delete/{id}', [StorageController::class, 'destroyStorage']);

Route::post('/grocery', [GroceryController::class, 'storeGrocery']);
Route::post('/storage', [StorageController::class, 'storeStorage']);

Route::get('/', function () {
    return view('welcome');
});
