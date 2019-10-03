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

Route::get('/', 'WelcomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/menus', 'MenuController@index'); // listado de pacientes listos para añadir menus 

Route::get('/menus/patient/{id}', 'MenuController@menus'); //listado de menus de pacientes
Route::get('/menus/patient', 'MenuController@create'); //formulario
Route::post('/menus/patient', 'MenuController@store'); //registrar menus
Route::get('/menus/patient/{id}/edit', 'MenuController@edit'); //formulario edicion
Route::post('/menus/patient/{id}/edit', 'MenuController@update'); //actualizar menus
Route::delete('/menus/patient/{id}', 'MenuController@destroy'); //formulario para eliminar