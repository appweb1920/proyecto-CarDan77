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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'ProductosController@EnviaProductos');
Route::get('/materiales', 'MaterialesController@EnviaMateriales');

Route::post('/guardaProducto', 'ProductosController@guardaProducto');
Route::get('/verproducto/{id}', 'ProductosController@VistaProducto');
Route::post('/guardaEdicion', 'ProductosController@guardaEdicion');
Route::get('/BorrarProd/{id}', 'ProductosController@BorrarProd');

Route::post('/guardaMaterial', 'MaterialesController@guardaMaterial');
Route::get('/detallesmaterial/{id}', 'MaterialesController@VistaMaterial');
Route::post('/guardaEdicionMaterial', 'MaterialesController@guardaEdicionMaterial');
Route::get('/BorrarMaterial/{id}', 'MaterialesController@BorrarMaterial');

Route::post('/guardaAgregado/{id}', 'MaterialesController@guardaAgregado');