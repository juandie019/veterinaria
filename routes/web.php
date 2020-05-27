<?php

use App\Mail\WelcomeEmail;
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
Route::resource('venta', 'VentaController');
Route::resource('file', 'FileController');

Route::post('/cliente/search', 'ClienteController@search')->name('cliente.search');
Route::post('/producto/search', 'ProductoController@search')->name('producto.search');
Route::post('/producto/actualizar_almacen', 'ProductoController@actualizarAlmacen');
Route::post('/producto/actualizar_piso', 'ProductoController@actualizarPiso');
Route::post('/empleado/search', 'EmpleadoController@search')->name('empleado.search');
Route::post('/empleado/{id_empleado}/primero', 'EmpleadoController@primerEmpleado');
Route::post('/producto/{productoId}', 'ProductoController@buscar')->name('producto.buscar');
Route::get('/venta/devolver/{ventaID}', 'DevolucionVenta@devolverProducto')->name('venta.devolver');
Route::get('/user/{imagen_id}', 'ImagenController@update')->name('user.imagen');
