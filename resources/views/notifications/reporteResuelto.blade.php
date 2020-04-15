@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card bg-secondary text-white text-center p-3">
	    <blockquote class="blockquote mb-0">
	    	<h2>{{$notificacion->data['subject']}}</h2>
	      	<p>Hemos aplicado la siguiente solución:
			<br><b>{{$notificacion->data['solucion']}}</b></p>

			<p>¡Gracias por ayudar!</p>
	      <footer class="blockquote-footer text-white">
	        <small>
	          <cite title="Source Title">El equipo de Reddema</cite>
	        </small>
	      </footer>
	    </blockquote>
	  </div>
</div>
@endsection