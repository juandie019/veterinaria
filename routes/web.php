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

Route::resource('empleado', 'EmpleadoController');
Route::resource('cliente', 'ClienteController');
Route::resource('producto', 'ProductoController');


// Route::get('/registrar_empleado', 'EmpleadoController@create')->name('registrar_empleado');
// Route::get('/empleados', 'EmpleadoController@index')->name('mostrar_empleados');
 //Route::post('/guardar_empleado', 'EmpleadoController@store');


// Route::get('/registrar_cliente', 'ClienteController@create')->name('registrar_cliente');
// Route::post('/guardar_cliente', 'ClienteController@store');


