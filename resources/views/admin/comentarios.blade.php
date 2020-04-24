@extends('layouts.app')
@section('content')
<div class="container">
	<h1>Comentarios</h1>
	@include('alertas')
	@foreach($comentarios as $comentario)
	<div class="card">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 >{{$comentario->user->name.' '.$comentario->user->lastname}}</h5>
			<div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      {{-- <div class="dropdown-header">Dropdown Header:</div> --}}
                	<a class="dropdown-item text-center" href="{{route('mostrar.perfil', $comentario->user->slug)}}" target="_blank">Ver perfil de usuario</a>
                    <a class="dropdown-item text-center" href="{{route('posts.show', $comentario->post->slug)}}" target="_blank">Ver publicación </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-center" href="#" data-target="#modalEliminarComentario{{$comentario->id}}" data-toggle="modal">Eliminar</a>
                </div>
            </div>
		</div>
	  <div class="card-body">
	    <h5 class="card-title">{{$comentario->body}}</h5>
	    {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
	  </div>
	</div>
	<br>
	@include('admin.includes.eliminarComentario')
	@endforeach
	{!! $comentarios->render()!!}
	<a href="{{route('home.admin')}}" title="Volver"><button type="button" class="btn btn-secondary"><i class="fas fa-reply"></i></button></a>
</div>
@endsection