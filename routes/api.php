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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/producto/{id_producto}', 'api\ProductoController@buscar')->middleware(['auth:api']);
Route::post('/venta/store', 'api\VentaController@store')->middleware(['auth:api']);
route::post('/cliente/{id_cliente}', 'api\ClienteController@buscar')->middleware(['auth:api']);
