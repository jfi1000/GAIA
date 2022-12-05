<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ClientController;
use App\Http\Controllers\Api\v1\ResiduoStatusController;
use App\Http\Controllers\Api\v1\ResiduoTipoController;
use App\Http\Controllers\Api\v1\OperationController;

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

Route::apiResource('client', ClientController::class);
Route::apiResource('operation', OperationController::class);
//->middleware('auth:sanctum');
Route::apiResource('residuoTipo', ResiduoTipoController::class);
//->middleware('auth:sanctum');
Route::apiResource('residuostatus', ResiduoStatusController::class)->middleware('auth:sanctum');
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //  return $request->user();
//});

//consultas
Route::get('operationall', [App\Http\Controllers\Api\v1\ConsultaController::class, 'getOperationAll']);
Route::get('operationallp', [App\Http\Controllers\Api\v1\ConsultaController::class, 'getOperationAllP']);