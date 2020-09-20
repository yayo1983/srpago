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

Route::get('/upload', 'SepomexController@index')->name('upload');

Route::post('/importarfile', 'SepomexController@fileImport')->name('importarfile');

Route::get('/importar', 'SepomexController@import');

Route::get('/', 'AsentamientoController@index')->name('index');

Route::post('/', 'AsentamientoController@index');

Route::get('consultar', 'AsentamientoController@apigasolina')->name('consultar');

Route::get('form', 'AsentamientoController@create')->name('form');

Route::post('/mostrar', 'AsentamientoController@show')->name('show');

Route::get('map', 'MapController@maps');
