<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ClientController;
use App\Http\Controllers\Api\v1\ResiduoStatusController;
use App\Http\Controllers\Api\v1\ResiduoTipoController;
use App\Http\Controllers\Api\v1\OperationController;
use App\Http\Controllers\Api\v1\ConsultaController;

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

//consultas
Route::get('operationall', [ConsultaController::class, 'getOperationAll']);
Route::get('operationallp', [ConsultaController::class, 'getOperationAllP']);
//api filtrado por estatus
Route::get('operationallf/{status}', [ConsultaController::class, 'getOperationAllF']);
Route::get('operation/search/{id}/{type}/{fecha1}/{fecha2}', [ConsultaController::class, 'getOperationSearch']);
