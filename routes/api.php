<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Upload files
Route::post('/asesor', 'App\Http\Controllers\ApiController@postAsesor');

Route::post('/asesores', 'App\Http\Controllers\ApiController@postAsesores');
Route::post('/clientes', 'App\Http\Controllers\ApiController@postClientes');
