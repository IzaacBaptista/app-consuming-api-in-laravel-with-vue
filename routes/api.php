<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//route cliente
Route::apiResource('cliente', 'App\Http\Controllers\ClienteController');

//route carro
Route::apiResource('carro', 'App\Http\Controllers\CarroController');

//route locação
Route::apiResource('locacao', 'App\Http\Controllers\LocacaoController');

//route marca
Route::apiResource('marca', 'App\Http\Controllers\MarcaController');

//modelo
Route::apiResource('modelo', 'App\Http\Controllers\ModeloController');

//login
Route::post('login', 'App\Http\Controllers\AuthController@login');

//logout
Route::post('logout', 'App\Http\Controllers\AuthController@logout');

//refresh
Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');

//me
Route::post('me', 'App\Http\Controllers\AuthController@me');

