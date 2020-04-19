@extends('layouts.app')
@section('content')
<div class="container">
@include('alertas')
	<h1>Reportes</h1>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<h2>Pendientes</h2>
			@foreach($pendientes as $pendiente)
			<div class="card text-white bg-warning mb-6" style="max-width: 26rem;">
			  <div class="card-header">
			  	De: <a href="{{route('mostrar.perfil', $pendiente->accuser->slug)}}" class="link-limpio-blanco" target="_blank">{{$pendiente->accuser->name.' '.$pendiente->accuser->lastname}}</a>
			  	|
			  	Para: <a href="{{route('mostrar.perfil', $pendiente->accused->slug)}}" class="link-limpio-blanco" target="_blank">{{$pendiente->accused->name.' '.$pendiente->accused->lastname}}</a>
			  </div>
			  <div class="card-body">
			    <h5 class="card-title"><a href="{{$pendiente->ruta}}" class="link-limpio-blanco" target="_blank">{{$pendiente->title}}</a></h5>
			    <p class="card-text">{{$pendiente->description}}</p>
			  </div>
			  <div class="card-footer">
			  	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalReport{{$pendiente->id}}">Resolver</button>
			  </div>
			</div>
			<br>

			@include('admin.includes.resolverReporte')

			@endforeach
			{!! $pendientes->render()!!}
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<h2>Resueltos</h2>
			@foreach($resueltos as $resuelto)
			<div class="card text-white bg-secondary mb-6" style="max-width: 26rem;">
			  <div class="card-header">
			  	De: <a href="{{route('mostrar.perfil', $pendiente->accuser->slug)}}" class="link-limpio-blanco" target="_blank">{{$resuelto->accuser->name.' '.$resuelto->accuser->lastname}}</a> |
			  	Para:  <a href="{{route('mostrar.perfil', $pendiente->accused->slug)}}" class="link-limpio-blanco" target="_blank">{{$resuelto->accused->name.' '.$resuelto->accused->lastname}}</a>
			  </div>
			  <div class="card-body">
			    <h5 class="card-title"><a href="{{$resuelto->ruta}}" class="link-limpio-blanco" target="_blank">{{$resuelto->title}}</a></h5>
			    <p class="card-text">{{$resuelto->description}}</p>
			  </div>
			  <div class="card-footer">
			  	{{$resuelto->resultado}}
			  </div>
			</div>
			<br>
			@endforeach
			{!! $resueltos->render()!!}
		</div>
	</div>

	<a href="{{route('home.admin')}}" title="Volver"><button type="button" class="btn btn-secondary"><i class="fas fa-reply"></i></button></a>

</div>
@endsection