@extends('layouts.app')
@section('content')
<div class="container">
	@include('alertas')
	<h3>
		@if(Auth::user()->id == $conversacion->remitente_id)
		Conversación con:<a href="{{route('mostrar.perfil', $conversacion->destinatario->slug)}}">{{$conversacion->destinatario->name.' '.$conversacion->destinatario->lastname}}</a></span>
		@else
		Conversación con:<a href="{{route('mostrar.perfil', $conversacion->remitente->slug)}}">{{$conversacion->remitente->name.' '.$conversacion->remitente->lastname}}</a></span>
		@endif
	</h3>
	<div class="card">
	  <div class="card-header">
	    {{$conversacion->subject}}
	  </div>
	  <div class="card-body">
	  	<div class="overflow-auto div-conversacion">
	  		@foreach($mensajes as $mensaje)
	  			@if($mensaje->sender_id == Auth::user()->id)
	  			<div class="row">
		  			<div class="col-md-1">
		  				<span style="font-size: 10px;">{{$mensaje->created_at}}</span>
		  			</div>
		  			<div class="col-md-11">
		  				<div class="p-3 mb-2 bg-info text-white rounded-left">{{$mensaje->body}}</div>
		  			</div>
		  		</div>
	  			@else
	  			<div class="row">
		  			<div class="col-md-11">
		  				<div class="p-3 mb-2 bg-secondary text-white rounded-right">{{$mensaje->body}}</div>
		  			</div>
		  			<div class="col-md-1">
		  				<span style="font-size: 10px;">{{$mensaje->created_at}}</span>
		  			</div>
		  		</div>
	  			@endif
	  		@endforeach
	  	</div>
	  </div>
	</div>
	<br>
	<div class="card border-primary mb-3">
	  <div class="card-header">Mensaje</div>
	  <div class="card-body text-primary">
	  	<form method="post" action="{{route('newMessage', $conversacion->id)}}" id="formEnviarMensaje">
	  	  @csrf
		  <div class="form-group">
		    <textarea class="form-control" name="body" rows="3"></textarea>
		  </div>
		</form>
	  </div>
	  <div class="card-footer">
		<button type="submit" class="btn btn-outline-primary" form="formEnviarMensaje">Enviar</button>
	  </div>
	</div>
</div>
@endsection