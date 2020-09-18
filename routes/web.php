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
Route::get('/foo', function () {
    $exitCode = Artisan::call('cache:clear');
});

Route::get('/', 'LandingController@index');

Auth::routes();

Route::middleware(['auth'])->group(function () {

Route::resource('users','UserController');
Route::get('users/{id}/edit/','UserController@edit');

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

Route::post('/cliente/guardar', 'ClientesController@store');
Route::post('/cliente/guardarNuevo', 'ClientesController@save');
Route::get('/cliente/{id}/edit', 'ClientesController@edit');

//Route::post('/cliente/actualizar', 'ClientesController@update');
Route::get('/cliente/cambiar/estado/{id}/{estado}', 'ClientesController@updateState');
Route::post('/cliente/eliminar/{id}', 'ClientesController@destroy');

Route::get('/obra', 'ObraController@index');
Route::get('/obra/listar', 'ObraController@listar');
Route::get('/obra/crear', 'ObraController@create');
Route::get('/obra/crearcontactos', 'ObraContactoController@create');
Route::post('/obra/guardar', 'ObraController@save');
Route::get('/obra/editar/{id}', 'ObraController@edit');
Route::post('/obra/actualizar', 'ObraController@update');

Route::get('/empresa', 'EmpresaController@index');
Route::get('/empresa/listar', 'EmpresaController@listar');
//Route::get('/empresa/crear', 'EmpresaController@create');

Route::post('/empresa/guardar', 'EmpresaController@store');
Route::post('/empresa/guardarNuevo', 'EmpresaController@save');
Route::get('/empresa/{id}/edit', 'EmpresaController@edit');

//Route::post('/empresa/actualizar', 'EmpresaController@update');
Route::post('/empresa/eliminar/{id}', 'EmpresaController@destroy');

Route::get('/obracontacto', 'ObraContactoController@index');
Route::post('/obracontacto/guardar', 'ObraContactoController@save');
Route::get('/obracontacto/listar', 'ObraContactoController@listar');
Route::get('/obracontacto/editar', 'ObraContactoController@edit');



Route::get('/encuesta', 'EncuestaController@index');
Route::get('/encuesta/listar', 'EncuestaController@listar');
Route::get('/encuesta/crear', 'EncuestaController@create');
Route::post('/encuesta/guardar', 'EncuestaController@save');
Route::get('/encuesta/eliminar/{id}', 'EncuestaController@destroy');

Route::get('/servicio', 'ServicioController@index');
Route::get('/servicio/listar', 'ServicioController@listar');
Route::get('/servicio/crear', 'ServicioController@create');
Route::post('/servicio/guardar', 'ServicioController@save');
Route::get('/servicio/editar/{id}', 'ServicioController@edit');
Route::post('/servicio/actualizar', 'ServicioController@update');
Route::get('/servicio/eliminar/{id}', 'ServicioController@destroy');

Route::get('/estadoservicio', 'EstadoServicioController@index');
Route::get('/estadoservicio/listar', 'EstadoServicioController@listar');
Route::get('/estadoservicio/crear', 'EstadoServicioController@create');
Route::post('/estadoservicio/guardar', 'EstadoServicioController@save');
Route::get('/estadoservicio/editar/{id}', 'EstadoServicioController@edit');
Route::post('/estadoservicio/actualizar', 'EstadoServicioController@update');
Route::get('/estadoservicio/eliminar/{id}', 'EstadoServicioController@destroy');



Route::get('/visita', 'VisitaController@index');
Route::get('/visita/listar', 'VisitaController@listar');
Route::get('/visita/crear', 'VisitaController@create');
Route::post('/visita/guardar', 'VisitaController@save');
Route::get('/visita/editar/{id}', 'VisitaController@edit');
Route::get('/visita/eliminar/{id}', 'VisitaController@destroy');
Route::post('/visita/actualizar', 'VisitaController@update');

Route::get('/listachequeo', 'ListaChequeoController@index');
Route::get('/listachequeo/listar', 'ListaChequeoController@listar');
Route::get('/listachequeo/crear', 'ListaChequeoController@create');
Route::post('/listachequeo/guardar', 'ListaChequeoController@save');
Route::get('/listachequeo/editar/{id}', 'ListaChequeoController@edit');
Route::post('/listachequeo/actualizar', 'ListaChequeoController@update');

Route::post('/cotizacion/wizardModal', 'CotizacionController@modal');

Route::get('/cotizacion', 'CotizacionController@index');
Route::get('/cotizacion/listar', 'CotizacionController@listar');
Route::get('/cotizacion/crear', 'CotizacionController@create');
Route::post('/cotizacion/guardar', 'CotizacionController@save');
Route::get('/cotizacion/editar/{id}', 'CotizacionController@edit');
Route::post('/cotizacion/actualizar', 'CotizacionController@update');
Route::get('/cotizacion/editarEstado/{id}', 'CotizacionController@editEstado');
Route::post('/cotizacion/estado', 'CotizacionController@actualizarestado');

Route::get('/cotizacion/informe', 'CotizacionController@informe');
Route::post('/cotizacion/generar/pdf', 'CotizacionController@generar_PDF');

Route::resource('ajaxestado','EstadoCotizacionController');
Route::get('/estadocotizacion', 'EstadoCotizacionController@index');
Route::get('/estadocotizacion/listar', 'EstadoCotizacionController@listar');
Route::get('/estadocotizacion/crear', 'EstadoCotizacionController@create');
Route::post('/estadocotizacion/guardar', 'EstadoCotizacionController@save');
Route::get('/estadocotizacion/editar/{id}', 'EstadoCotizacionController@edit');
Route::post('/estadocotizacion/actualizar', 'EstadoCotizacionController@update');
Route::get('/estadocotizacion/eliminar/{id}', 'EstadoCotizacionController@destroy');

Route::resource('ajaxetapa','EtapaController');
Route::get('/etapa', 'EtapaController@index');
Route::get('/etapa/listar', 'EtapaController@listar');

Route::resource('ajaxjornada','JornadaController');
Route::get('/jornada', 'JornadaController@index');
Route::get('/jornada/listar', 'JornadaController@listar');

Route::resource('ajaxmodalidad','ModalidadController');
Route::get('/modalidad', 'ModalidadController@index');
Route::get('/modalidad/listar', 'ModalidadController@listar');

Route::resource('ajaxtipoConcreto','TipoConcretoController');
Route::get('/tipoConcreto', 'TipoConcretoController@index');
Route::get('/tipoConcreto/listar', 'TipoConcretoController@listar');

Route::get('/maquinaria', 'MaquinariaController@index');
Route::resource('ajaxmaquinaria','MaquinariaController');
Route::get('/maquinaria/cambiar/estado/{id}/{estado}', 'MaquinariaController@updateState');

Route::get('/operario', 'OperarioController@index');
Route::resource('ajaxoperario','OperarioController');

});


