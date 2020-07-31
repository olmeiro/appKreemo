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

Route::get('/encuesta', 'EncuestaController@index');

Route::get('/visita', 'VisitaController@index');

Route::get('/cotizacion', 'CotizacionController@index');



});
