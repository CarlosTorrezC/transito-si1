<?php

use Illuminate\Support\Facades\Route;
use App\Nombre;

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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::get('/vehiculo/consulta', 'VehiculosController@consulta');
Route::get('/vehiculo/resultados', 'VehiculosController@resultados');
Route::get('/consulta', 'PagesController@consulta');
Route::get('/resultados', 'PagesController@resultados');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){
    //Roles
    Route::resource('roles', 'RoleController');

    //User
    Route::resource('users', 'UserController');

    //Vehiculo
    Route::resource('vehiculo', 'VehiculosController');

    //Multa
    Route::resource('multa', 'MultasController');

    //Oficial
    Route::resource('oficial', 'OficialesController');

    //Ciudadano
    Route::resource('ciudadano', 'CiudadanosController');

    //Licencias M
    Route::resource('licenciasM', 'LicenciaMController');

    //Licencias T
    Route::resource('licenciasT', 'LicenciaTController');

    //Licencias A
    Route::resource('licenciasA', 'LicenciaAController');

    //Infracciones
    Route::resource('infraccion', 'InfraccionesController');

    //Categorias
    Route::resource('categorias', 'CategoriasController');

    //Historiales
    //Route::resource('historial', 'HistorialesController');

    //Reportes
    Route::resource('reporte', 'ReportesController');

    //Seguros
    Route::resource('seguro', 'SegurosController');

    //Tipos de Vehiculos
    Route::resource('tiposvehiculos', 'TiposVehiculosController');

    //Bitacora
    Route::resource('bitacora', 'BitacorasController');

    //Marcas
    Route::resource('marcas', 'MarcasController');

    //Nombre
    Route::resource('nombre', 'NombresController');

    //Titulo
    Route::resource('titulos', 'TitulosController');

    //Capitulo
    Route::resource('capitulos', 'CapitulosController');
});