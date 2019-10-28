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
/* Rutas para dietas */
Route::post('/menus/temp', 'MenuController@pre');

Route::get('/menus', 'MenuController@index'); // listado de pacientes listos para añadir menus

Route::get('/menus/patientMassive/{id}', 'MenuController@massiveView');
Route::post('/menus/patientMassive', 'MenuController@massive');
Route::post('/menus/getCatalog', 'MenuController@getCatalog');
Route::get('/menus/patient/{id}', 'MenuController@menus'); //listado de menus de pacientes

Route::get('/menus/patient/{id}/edit', 'MenuController@edit'); //formulario edicion
Route::post('/menus/patient/{id}/edit', 'MenuController@update'); //actualizar menus
Route::delete('/menus/patient/{id}', 'MenuController@destroy'); //formulario para eliminar

Route::get('/menus/As/{id}', 'MenuController@existent'); //formulario asignar existente
Route::get('/menus/Asignar/{id}', 'MenuController@existent'); //formulario asignar existente
Route::get('/menus/massiveAsign/{idmenu}85{idPatient}', 'MenuController@massiveEx'); //formulario asignar existente
Route::delete('/menus/patient/{id}/delete', 'MenuController@destroy'); //formulario para eliminar

/* Rutas para pacientes  */
Route::get('/patient', 'PatientController@index'); //listado de pacientes
Route::get('/patient/{id}/view', 'PatientController@view'); //datos del paciente
Route::get('/patient/add', 'PatientController@create'); //formulario para ingresar a un paciente nuevo
Route::post('/patient/add', 'PatientController@store'); //guardar informacion del paciente
Route::get('/patient/{id}/edit', 'PatientController@edit'); //formulario edicion
Route::post('/patient/{id}/edit', 'PatientController@update'); //actualizar usuario
Route::delete('/patient/{id}/delete', 'PatientController@destroy'); //formulario para eliminar

//Subir archivos
Route::get('/patient/{id}/agregar', 'PatientController@atachIndex'); //Imagenes por usuario y archivos
Route::post('/upload', 'imageController@postUpload')->name('uploadfile');
Route::post('/upload2', 'documentController@postUpload')->name('uploaddoc');
Route::get('/deleteimg/{id}', 'imageController@imageDelete');
Route::get('/deletedoc/{id}', 'documentController@docDelete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
