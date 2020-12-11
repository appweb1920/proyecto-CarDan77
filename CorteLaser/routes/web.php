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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/home', 'ProductosController@EnviaProductos')->middleware('auth');
Route::get('/materiales', 'MaterialesController@EnviaMateriales')->middleware('auth');
Route::get('/pedidosyventas', 'PedidosController@EnviaPedidos')->middleware('auth');
Route::get('/gananciasygastos', 'PedidosController@EnviaGG')->middleware('auth'); 


Route::post('/guardaProducto', 'ProductosController@guardaProducto')->middleware('auth');
Route::get('/verproducto/{id}', 'ProductosController@VistaProducto')->middleware('auth');
Route::post('/guardaEdicion', 'ProductosController@guardaEdicion')->middleware('auth');
Route::get('/BorrarProd/{id}', 'ProductosController@BorrarProd')->middleware('auth');

Route::post('/guardaMaterial', 'MaterialesController@guardaMaterial')->middleware('auth');
Route::get('/detallesmaterial/{id}', 'MaterialesController@VistaMaterial')->middleware('auth');
Route::post('/guardaEdicionMaterial', 'MaterialesController@guardaEdicionMaterial')->middleware('auth');
Route::get('/BorrarMaterial/{id}', 'MaterialesController@BorrarMaterial')->middleware('auth');

Route::post('/guardaAgregado/{id}', 'MaterialesController@guardaAgregado')->middleware('auth');
Route::post('/guardaPedido', 'PedidosController@guardaPedido')->middleware('auth');

Route::get('/vendido/{id}', 'PedidosController@Venta')->middleware('auth');

Route::get('/borrarPedido/{id}', 'PedidosController@BorrarPedido')->middleware('auth');



