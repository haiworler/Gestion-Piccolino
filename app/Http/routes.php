<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth/login');
});
Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('persona','PersonaController');
Route::resource('user','UserController');
Route::resource('semestre','SemestreController');
Route::resource('corte','CorteController');
Route::resource('grado','GradoController');
Route::resource('costomatricula','CostoMatriculaController');
Route::resource('matricula','MatriculaController');
Route::resource('materia','MateriaController');
Route::resource('grupo','GrupoController');
Route::resource('matriculgrupo','MatriculaGrupoController');
Route::resource('materiagrupo','MateriaGrupoController');
Route::resource('maestromateria','MaestroMateriaController');


Route::get('listabarrio/{id}/barrios','ConsultaController@getListBarrio');
Route::get('BorrarContacto/{id}/Contacto','BorrarController@getBorrarContacto');
Route::get('BorrarDocumento/{id}/Documento','BorrarController@getBorrarDocumento');
Route::get('detailperson/{id}','PersonaController@DetallePersona');
Route::get('/listvoluntary','PersonaController@ListVoluntary');
Route::get('assign/{id}/user','UserController@AssignUser');
Route::get('BorrarCorteSemestre/{id}/CorteSemestre','BorrarController@getBorrarCorteSemestre');
Route::get('/filterstudy','MatriculaController@FilterStudy');
Route::post('/ConsultStudent','MatriculaController@ConsultStudent');
Route::get('registerenrollment/{id}/registration','MatriculaController@RegisterEnrollment');
Route::get('add/{id}/student','GrupoController@addstudent');
Route::post('assignstudenttogroup','GrupoController@assignstudenttogroup');
Route::get('info/{id}/group','GrupoController@infogroup');
Route::get('add/{id}/matter','GrupoController@addmatter');
Route::post('assignmatter','GrupoController@assignmatter');
Route::get('assign/{id}/teachers','MateriaController@assignteachers');
Route::post('addteachers','MateriaController@addteachers');
Route::get('info/{id}/matter','MateriaController@info');
Route::get('class/{id}/schedule','GrupoController@classschedule');

