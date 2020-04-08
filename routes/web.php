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

	Route::resource('notifications', 'NotificacionesController');


	//Publicaciones/post
	Route::get('Publicar', [
		'uses' => 'PostController@create',
		'as' => 'new.post'
	]);

	Route::get('/filtros', [
		'uses' => 'PostController@filtrar',
		'as' => 'filtrar.post'
	 ]);

	Route::get('/buscar', [
		'uses' => 'PostController@buscar',
		'as' => 'buscar.post'
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


	Route::get('Exportar/{id}', [
		'uses' => 'PostController@exportar',
		'as' => 'exportar.post'
	]);

	// Fin Publicaciones/post

	//Marcar notificacion como leida

	Route::get('Notificaciones', [
		'uses' => 'NotificacionesController@index',
		'as' => 'notifications.index'
	]);

	Route::patch('notificaciones/{id}', 'NotificacionesController@read')->name('notifications.read');
	Route::delete('notificaciones/{id}', 'NotificacionesController@destroy')->name('notifications.destroy');


	//Ruta para mostrar el mensaje de una notificacion de una eliminación

	Route::get('Notificaciones/Contenido-eliminado/{id}', [
		'uses' => 'NotificacionesController@show',
		'as' => 'notifications.show'
	]);

	// Reportes

	Route::resource('reports', 'ReportController');

	Route::post('Reportar/{id}', [
		'uses' => 'ReportController@report',
		'as' => 'reports.make'
	]);
});

Route::group(['prefix'=>'/Admin', 'middleware'=>['admin']], function(){

	Route::get('/Panel', [
		'uses' => 'AdminController@index',
		'as' => 'home.admin'
	]);

	Route::get('/Usuarios', [
		'uses' => 'AdminController@userIndex',
		'as' => 'users.index'
	]);

	Route::post('Eliminar/Usuario/{id}', [
		'uses' => 'AdminController@eliminarUsuario',
		'as' => 'eliminar.usuario'
	]);

	//publicaciones

	Route::get('/Publicaciones', [
		'uses' => 'AdminController@publicacionesIndex',
		'as' => 'admin.posts.index'
	]);

	Route::post('Eliminar/Publicacion/{id}', [
		'uses' => 'AdminController@eliminarPublicacion',
		'as' => 'eliminar.post'
	]);

	Route::get('/buscar', [
		'uses' => 'PostController@buscar',
		'as' => 'buscar.post'
	]);

	Route::get('Reportes', [
		'uses' => 'ReportController@index',
		'as' => 'reports.index'
	]);


});