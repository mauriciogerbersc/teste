<?php

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

Route::get('/', 'LocadoraController@index');

Route::get('/locadora/listar', 'LocadoraController@listar');
Route::post('/locadora/listar', 'LocadoraController@listarPost');