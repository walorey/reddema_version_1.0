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

@section('script')
	<script>
		$(document).ready(function(){
			$('#provincia').on('change', function(){
				var provincia_id = $(this).val();
				if ($.trim(provincia_id) != '') {
					$.get('departamentos', {provincia_id: provincia_id}, function (departamentos){
						$('#departamento').empty();
						$('#departamento').append("<option value=''>Seleccione un Partido, Departamento o comuna</option>");
						$.each(departamentos, function(index, value){
							$('#departamento').append("<option value='"+ index +"'>"+ value +"</option>");
						});
					});
				}
			});
		});
	</script>
	<script>
		$(document).ready(function(){
			$('#departamento').on('change', function(){
				var departamento_id = $(this).val();
				if ($.trim(departamento_id) != '') {
					$.get('zonas', {departamento_id: departamento_id}, function (zonas){
						$('#zona').empty();
						$('#zona').append("<option value=''>Seleccione una localidad</option>");
						$.each(zonas, function(index, value){
							$('#zona').append("<option value='"+ index +"'>"+ value +"</option>");
						});
					});
				}
			});
		});
	</script>
@endsection