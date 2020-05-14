<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/hacer_venta', function(){
    return view('ventas.compo');
});

Route::resource('empleado', 'EmpleadoController');
Route::resource('cliente', 'ClienteController');
Route::resource('producto', 'ProductoController');
Route::resource('venta', 'VentaController');

Route::post('/cliente/search', 'ClienteController@search')->name('cliente.search');
Route::post('/producto/search', 'ProductoController@search')->name('producto.search');
Route::post('/empleado/search', 'EmpleadoController@search')->name('empleado.search');

Route::post('/producto/{productoId}', 'ProductoController@buscar')->name('producto.buscar');


