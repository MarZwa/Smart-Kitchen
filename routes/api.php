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

Route::post('rfid/{rfid}/create-grocery', [ApiController::class, 'createGrocery']);

Route::post('rfid/{rfid}/create-storage', [ApiController::class, 'createStorage']);

Route::get('rfid/{rfid}', [ApiController::class, 'getUserRFID'])->whereAlphaNumeric('rfid');
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
