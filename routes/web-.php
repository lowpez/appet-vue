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

Route::get('/', 'Auth\LoginController@showLoginForm');

//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user','UserController@index')->name('user.name');

Route::delete('/user/{id}','UserController@destroy')->name('user.destroy');

Route::get('/settings','UserController@perfil')->name('user.perfil');
Route::get('/cargarPerfil','userController@getPerfil');

Route::put('/user/perfil/edit/{id}','UserController@actualizar_perfil')->name('user.perfil.edit');
Route::put('/user/perfil/imagen','UserController@postUploadProfilePic')->name('user.perfil.imagen');
Route::get('/obtenerOrganizacion','OrganizacionController@getOrganizaciones');
Route::post('/organizacion','OrganizacionController@update');


Route::get('/state','UserController@state')->name('state');
Route::get('/cities/{id}','UserController@cities')->name('ciudad');

//pet controller
Route::resource('/pets','PetController');
Route::get('/getPet','PetController@getPet');

//ruta para editar la imagen
Route::put('/pet-imagen','PetController@updateImagen');
Route::post('/deletemascota','PetController@deletePet');
Route::get('/especies','PetController@especie');
Route::get('/raza/{id}','PetController@razas');

//get actividades
Route::get('/actividades','ActividadController@index');

//ruta para generar el qr en pdf
Route::get('/tags-pdf/{tag_id}','PetController@tagPdfId');

//buscar_tags_id

Route::get('/tag/{tag_id}','PrincipalController@pet_tag')->name('pet_tag.index');
Route::get('/tag-id/{tag_id}','PrincipalController@lecto_qr_buscar_pet')->name('pet_tag_id.index');

Route::get('/buscar-tag-id/{tag_id}','PrincipalController@buscarTagID');

Route::post('/guardar_visto','PrincipalController@guardar_visto');
Route::post('/viewComment','PrincipalController@guardar_visto_commentario');

Route::get('/get-full-image/{img}','PrincipalController@imagen')->name('imagen.full');

//rutas de notificaciones
Route::get('/notifications','PrincipalController@notificacionesIndex')->name('notifications');
//Route::get('/notificaciones','PrincipalController@notificaciones');
//traspaso envio correo
Route::post('/traspaso_post','PetController@trapasoMascota')->name('traspaso');
Route::get('/confirmar-traspaso/pet/{id}/user/{user_id}','PetController@aceptarTraspaso');

