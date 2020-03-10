<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::group(['middleware' => 'auth'], function(){

	Route::get('/home', 'PostController@index')->name('home');

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

	//Marcar notificacion como leida

	Route::get('notificaciones', [
		'uses' => 'NotificacionesController@index',
		'as' => 'leer.notificacion'
	]);

	Route::patch('notificaciones/{id}', 'NotificacionesController@read')->name('notifications.read');
});