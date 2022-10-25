<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ClientController;
use App\Http\Controllers\Api\v1\ResiduoStatus;
use App\Http\Controllers\Api\v1\ResiduoTipo;

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
Route::post('user', [App\Http\Controllers\UserController::class, 'store']);
Route::post('userlogin', [App\Http\Controllers\UserController::class, 'login']);
// Route::get('user', [App\Http\Controllers\UserController::class, 'index']);

Route::apiResource('client', ClientController::class)->middleware('auth:sanctum');
Route::apiResource('residuoTipo', ResiduoTipo::class)->middleware('auth:sanctum');
Route::apiResource('residuostatus', ResiduoStatus::class)->middleware('auth:sanctum');
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //  return $request->user();
//});
