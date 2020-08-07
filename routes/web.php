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

Route::get('/', 'LandingController@index');

Auth::routes();

Route::middleware(['auth'])->group(function () {

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/clientes', 'ClientesController@index');
Route::get('/clientes/crear', 'ClientesController@create'
)->name('Cliente.contacto');

Route::get('/encuesta', 'EncuestaController@index');
Route::get('/encuesta/crear', 'EncuestaController@create'
)->name('Encuesta.create');

Route::get('/visita', 'VisitaController@index');

Route::get('/cotizacion', 'CotizacionController@index');
Route::get('/cotizacion/crear', 'CotizacionController@create'
)->name('Cotizacion.create');

Route::get('/maquinaria', 'MaquinariaController@index');

});
