<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('users', [ApiController::class, 'getAllUsers']);
Route::get('users/{id}', [ApiController::class, 'getUser']);

Route::get('users/{id}/grocerylist', [ApiController::class, 'getAllGroceryProducts']);

Route::get('users/{id}/storagelist', [ApiController::class, 'getAllStorageProducts']);

Route::post('users/{id}/create-grocery', [ApiController::class, 'createGrocery']);

Route::post('users/{id}/create-storage', [ApiController::class, 'createStorage']);
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
