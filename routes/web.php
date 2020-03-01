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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'PostController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){


	Route::resource('front', 'FrontController');

	Route::resource('posts', 'PostController');

	Route::resource('users', 'UserController');

	Route::get('Publicar', [
		'uses' => 'PostController@create',
		'as' => 'new.post'
	]);

	Route::get('Publicaciones', [
		'uses' => 'PostController@index',
		'as' => 'index.post'
	]);

	Route::get('/filtros', [
		'uses'=> 'PostController@filtrar',
		'as'=> 'filtrar.post'
	 ]);

	Route::get('Zona/{name}/{id}', [
		'uses' => 'PostController@verZona',
		'as' => 'filtrar.zona'
	]);

	Route::get('Categoria/{category}', [
		'uses' => 'PostController@verCategoria',
		'as' => 'filtrar.categoria'
	]);

	Route::get('Tipo-Animal/{animal_type}', [
		'uses' => 'PostController@verTipoAnimal',
		'as' => 'filtrar.tipoAnimal'
	]);

	Route::post('Comentando/{id}', [
		'uses' => 'PostController@comentar',
		'as' => 'post.comentar'
	]);

});