<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Models\User;
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

Route::get('/', [UsersController::class, 'index']);

Route::get('/afval', [\App\Http\Controllers\AfvalController::class, 'sorteren']);
Route::get('/status/{naam}', [\App\Http\Controllers\AfvalController::class, 'statusUpdate']);
Route::get('/set/{dag}', [\App\Http\Controllers\AfvalController::class, 'setDag']);

Route::get('/users', [UsersController::class, 'index']);
Route::get('/users/{id}', [UsersController::class, 'show']);
Route::get('/users/{id}/products', [UsersController::class, 'showUsage']);
Route::get('/user/{id}/edit', [UsersController::class, 'edit']);
Route::patch('/user/{id}/update', [UsersController::class, 'update']);
Route::get('/user/create', [UsersController::class, 'create']);
Route::post('/user', [UsersController::class, 'store']);
Route::get('/user/delete/{id}', [UsersController::class, 'confirmation']);
Route::delete('/delete', [UsersController::class, 'destroy']);


Route::get('/foods/{id}', [\App\Http\Controllers\UsersController::class, 'showFoods']);
Route::get('/foods/{id}/daily', [\App\Http\Controllers\UsersController::class, 'showDailyFoods']);
Route::get('/foods/{id}/weekly', [\App\Http\Controllers\UsersController::class, 'showWeeklyFoods']);

Route::get('/cutlery', [\App\Http\Controllers\CutleryController::class, 'show']);
Route::post('/cutlery/reset', [\App\Http\Controllers\CutleryController::class, 'update']);
Route::get('/grocerylist', [GroceryController::class, 'grocery']);
Route::get('/storagelist', [StorageController::class, 'storage']); 

Route::delete('/grocery-clear', [GroceryController::class, 'destroyGrocery']);
Route::delete('/storage-delete/{id}', [StorageController::class, 'destroyStorage']);

Route::post('/store', [StorageController::class, 'storeStorage']);
Route::post('/grocery', [GroceryController::class, 'storeGrocery']);


