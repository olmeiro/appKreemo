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

Route::get('/tipocontacto', 'TipoContactoController@index');
Route::get('/tipocontacto/listar', 'TipoContactoController@listar');
Route::get('/tipocontacto/crear', 'TipoContactoController@create');
Route::post('/tipocontacto/guardar', 'TipoContactoController@save');
Route::get('/tipocontacto/editar/{id}', 'TipoContactoController@edit');
Route::post('/tipocontacto/actualizar', 'TipoContactoController@update');
Route::get('/tipocontacto/eliminar/{id}', 'TipoContactoController@destroy');

Route::get('/cliente', 'ClientesController@index');
Route::get('/cliente/listar', 'ClientesController@listar');
Route::get('/cliente/crear', 'ClientesController@create');
Route::post('/cliente/guardar', 'ClientesController@save');
Route::get('/cliente/editar/{id}', 'ClientesController@edit');
Route::post('/cliente/actualizar', 'ClientesController@update');
Route::get('/cliente/cambiar/estado/{id}/{estado}', 'ClientesController@updateState');

Route::get('/obra', 'ObraController@index');
Route::get('/obra/listar', 'ObraController@listar');
Route::get('/obra/crear', 'ObraController@create');
Route::get('/obra/crearcontactos', 'ObraContactosController@create');
Route::post('/obra/guardar', 'ObraController@save');
Route::get('/obra/editar/{id}', 'ObraController@edit');
Route::post('/obra/actualizar', 'ObraController@update');

Route::get('/empresa', 'EmpresaController@index');
Route::get('/empresa/listar', 'EmpresaController@listar');
Route::get('/empresa/crear', 'EmpresaController@create');
Route::post('/empresa/guardar', 'EmpresaController@save');
Route::get('/empresa/editar/{id}', 'EmpresaController@edit');
Route::post('/empresa/actualizar', 'EmpresaController@update');

Route::get('/obracontacto', 'ObraContactoController@index');
Route::post('/obracontacto/guardar', 'ObraContactoController@save');
Route::get('/obracontacto/listar', 'ObraContactoController@listar');
Route::get('/obracontacto/editar', 'ObraContactoController@edit');



Route::get('/encuesta', 'EncuestaController@index');
Route::get('/encuesta/crear', 'EncuestaController@create'
)->name('Encuesta.create');

Route::get('/visita', 'VisitaController@index');

Route::get('/cotizacion', 'CotizacionController@index');
Route::get('/cotizacion/crear', 'CotizacionController@create'
)->name('Cotizacion.create');

Route::get('/maquinaria', 'MaquinariaController@index');

});
