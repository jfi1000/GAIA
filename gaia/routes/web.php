<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

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
//Route::get('/client', [App\Http\Controllers\Api\v1\ClientController::class, 'index'])->name('client');
// Route::get('/ruta_pruebas', function () {
//     return view('index_gaia');
// });

Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('user');

Route::group(['middleware' => 'role:Administrador'], function () {

Route::get('/', function () {
    return view('welcome');
});

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/ruta_pruebas', [App\Http\Controllers\HomeController::class, 'pruebas'])->name('pruebas');

