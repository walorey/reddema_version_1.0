@extends('layouts.app')
@section('content')
<div class="container">
	<h3>
		@if(Auth::user()->id == $conversacion->remitente_id)
		Conversación con: {{$conversacion->destinatario->name.' '.$conversacion->destinatario->lastname}}
		@else
		Conversación con: {{$conversacion->remitente->name.' '.$conversacion->remitente->lastname}}
		@endif
	</h3>
	<div class="card">
	  <div class="card-header">
	    {{$conversacion->subject}}
	  </div>
	  <div class="card-body">
	  	<div class="overflow-auto div-conversacion">
	  		<div class="row">
	  			<div class="col-md-11">
	  				<div class="p-3 mb-2 bg-secondary text-white rounded-right">Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto</div>
	  			</div>
	  			<div class="col-md-1">
	  				<span>Hora</span>
	  			</div>
	  		</div>
	  		<div class="row">
	  			<div class="col-md-1">
	  				<span>Hora</span>
	  			</div>
	  			<div class="col-md-11">
	  				<div class="p-3 mb-2 bg-info text-white rounded-left">Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto</div>
	  			</div>
	  		</div>
	  		<div class="row">
	  			<div class="col-md-1">
	  				<span>Hora</span>
	  			</div>
	  			<div class="col-md-11">
	  				<div class="p-3 mb-2 bg-info text-white rounded-left">Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto</div>
	  			</div>
	  		</div>
	  		<div class="row">
	  			<div class="col-md-11">
	  				<div class="p-3 mb-2 bg-secondary text-white rounded-right">Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto</div>
	  			</div>
	  			<div class="col-md-1">
	  				<span>Hora</span>
	  			</div>
	  		</div>
	  		<div class="row">
	  			<div class="col-md-11">
	  				<div class="p-3 mb-2 bg-secondary text-white rounded-right">Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto Mucho texto</div>
	  			</div>
	  			<div class="col-md-1">
	  				<span>Hora</span>
	  			</div>
	  		</div>
	  	</div>
	  </div>
	</div>
	<br>
	<div class="card border-primary mb-3">
	  <div class="card-header">Mensaje</div>
	  <div class="card-body text-primary">
	  	<form>
		  <div class="form-group">
		    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
		  </div>
		</form>
	  </div>
	  <div class="card-footer">
		<button type="button" class="btn btn-outline-primary">Enviar</button>
	  </div>
	</div>
</div>
@endsection