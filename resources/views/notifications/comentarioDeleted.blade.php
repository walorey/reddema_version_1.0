@extends('layouts.app')
@section('content')
<div class="container">
	<div class="card bg-danger text-white text-center p-3">
	    <blockquote class="blockquote mb-0">
	    	<h2>{{$notificacion->data['subject']}}</h2>
	      	<p>Eliminamos un comentario de la publicación <a href="{{$notificacion->data['link-post']}}" target="_blank">{{$notificacion->data['post']['title']}}</a> porque viola nuestras normas de contenido.
			<br>Puedes seguir utilizando la plataforma pero te pedimos que revises el contenido que compartes.</p>

			<p>Revisa nuestras <a href="#" class="link-limpio-blanco" target="_blank">políticas y normas de seguridad</a> para más información.</p>
	      <footer class="blockquote-footer text-white">
	        <small>
	          <cite title="Source Title">El equipo de Reddema</cite>
	        </small>
	      </footer>
	    </blockquote>
	  </div>
</div>
@endsection