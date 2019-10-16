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

use App\Http\Controllers\MenuController;

Route::get('/', 'WelcomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/menus/temp', 'MenuController@pre');

Route::get('/menus', 'MenuController@index'); // listado de pacientes listos para añadir menus

Route::get('/menus/patientMassive', 'MenuController@massiveView');
Route::post('/menus/patientMassive', 'MenuController@massive');
<<<<<<< HEAD
Route::post('/menus/getCatalog', 'MenuController@getCatalog');
=======

>>>>>>> 1b25e9fdac9b88a3c50560e6d07e3db5b5b2fd79
Route::get('/menus/patient/{id}', 'MenuController@menus'); //listado de menus de pacientes
/* useless
    Route::get('/menus/patient', 'MenuController@create'); //formulario
    Route::post('/menus/patient', 'MenuController@store'); //registrar recetas para el paciente
useless */
Route::get('/menus/patient/{id}/edit', 'MenuController@edit'); //formulario edicion
Route::post('/menus/patient/{id}/edit', 'MenuController@update'); //actualizar menus
<<<<<<< HEAD
Route::delete('/menus/patient/{id}', 'MenuController@destroy'); //formulario para eliminar
Route::get('/menus/Asignar', 'MenuController@existent'); //formulario asignar existente
=======

Route::delete('/menus/patient/{id}/delete', 'MenuController@destroy'); //formulario para eliminar
/* Rutas para pacientes  */

Route::get('/patient', 'PatientController@index'); //listado de pacientes
Route::get('patient/add', 'PatientController@create'); //formulario
Route::get('patient/add', 'PatientController@store'); //guardar
Route::get('/patient/edit/{id}', 'PatientController@edit'); //formulario edicion
Route::post('/menus/edit{id}', 'PatientController@update'); //actualizar usuario
Route::delete('patient/{id}', 'PatientController@destroy'); //formulario para eliminar
>>>>>>> 1b25e9fdac9b88a3c50560e6d07e3db5b5b2fd79
