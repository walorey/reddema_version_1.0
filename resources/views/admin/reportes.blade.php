@extends('layouts.app')
@section('content')
<div class="container">
	<h1>Reportes</h1>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<h2>Pendientes</h2>
			@foreach($pendientes as $pendiente)
			<div class="card text-white bg-warning mb-6" style="max-width: 26rem;">
			  <div class="card-header">De: {{$pendiente->accuser->name.' '.$pendiente->accuser->lastname}}</div>
			  <div class="card-body">
			    <h5 class="card-title"><a href="{{$pendiente->ruta}}" class="link-limpio-blanco" target="_blank">{{$pendiente->title}}</a></h5>
			    <p class="card-text">{{$pendiente->description}}</p>
			  </div>
			  <div class="card-footer">
			  	Para: {{$pendiente->accused->name.' '.$pendiente->accused->lastname}}
			  </div>
			</div>
			<br>
			@endforeach
			{!! $pendientes->render()!!}
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<h2>Resueltos</h2>
			@foreach($resueltos as $resuelto)
			<div class="card text-white bg-secondary mb-6" style="max-width: 26rem;">
			  <div class="card-header">De: {{$resuelto->accuser->name.' '.$resuelto->accuser->lastname}}</div>
			  <div class="card-body">
			    <h5 class="card-title"><a href="{{$resuelto->ruta}}" class="link-limpio-blanco" target="_blank">{{$resuelto->title}}</a></h5>
			    <p class="card-text">{{$resuelto->description}}</p>
			  </div>
			  <div class="card-footer">
			  	Para: {{$resuelto->accused->name.' '.$resuelto->accused->lastname}}
			  </div>
			</div>
			@endforeach
			{!! $resueltos->render()!!}
		</div>
	</div>
</div>
@endsection