@extends('layouts.app')

@section('content')
<div class="container">
	@include('alertas')
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<button type="button" class="btn btn-outline-success btn-lg btn-block" data-toggle="modal" data-target="#modalPublicar">Publicar</button>
			<br>
			@include('posts.includes.filtros')
		</div>
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">



			@if($posts->count() == 0)

			<h2 class="text-center">No hay publicaciones.</h2>
			<h3 class="text-center">Prueba cambiando los filtros.</h3>

			@endif

			@include('posts.includes.publicaciones')


		</div>
		<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
			@include('posts.includes.zonas')
		</div>
	</div>
</div>

@include('posts.includes.crearPublicacion')
{{-- @include('posts.includes.eliminarPublicacion') --}}


@endsection