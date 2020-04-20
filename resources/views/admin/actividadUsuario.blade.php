@extends('layouts.app')
@section('content')
<div class="container">
	<div class="container-fluid">
		<h1 class="h3 mb-2 text-gray-800">Actividad de {{$usuario->name}} {{$usuario->lastname}}</h1>
		<div class="row">
		 <!-- Columna Perfil-Comentarios-->
        	<div class="col-lg-6 mb-4">
              <!-- Perfil -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Perfil</h6>
                </div>
                <div class="card-body">
                	<div class="row">
                		<div class="col-md-5">
                			<img src="{{asset($usuario->avatar)}}"  class="imagen-perfil" alt="...">
                		</div>
                		<div class="col-md-7">
                			<p>{{$usuario->descripcion}}</p>
                		</div>
                	</div>
                </div>
              </div>
              {{-- Fin perfil --}}

              <!-- Comentarios -->
              <h5>Comentarios</h5>
              @if($comentarios->count()<1)
            	<h6>No hay comentarios</h6>
           	  @else
	            @foreach($comentarios as $comentario)
	            <div class="card shadow mb-4">
	                <div class="card-header py-3 bg-primary">
	                  <a href="{{route('posts.show', $comentario->post->slug)}}" class="link-limpio" target="_blank"><h6 class="m-0 font-weight-bold text-white">{{$comentario->post->title}}</h6></a>
	                </div>
	                <div class="card-body">
	                  <p>
	                  	{{$comentario->body}}
	                  </p>
	                </div>
              </div>
              {{-- Fin comentarios --}}
	           	@endforeach
	           	{!! $comentarios->render()!!}
           	  @endif
          </div>
          {{-- Fin columna Perfil-Comentarios --}}
          {{-- Columna Publicaciones-Reportes --}}
          <div class="col-lg-6 mb-4">
			<!-- Publicaciones -->
            <h5>Publicaciones</h5>
            @if($posts->count()<1)
            	<h6>No hay publicaciones</h6>
            @else
	            @foreach($posts as $post)
				<div class="card shadow mb-4">
	            	<div class="card-header py-3 bg-dark">
	                  <a href="{{route('posts.show', $post->slug)}}" class="link-limpio" target="_blank"><h6 class="m-0 font-weight-bold text-white">{{$post->title}}</h6></a>
	                </div>
	                <div class="card-body">
	                  <p>{{substr($post->description, 0,197)}}</p>
				    	@if(strlen($post->description)>197)
				    		<b>...</b>
				    	@endif
	                </div>
	           	</div>
	           	@endforeach
	           	{!! $posts->render()!!}
           	@endif
			{{-- Fin Publicaciones --}}
			<!-- Reportes-->
            <h5>Reportes</h5>

			<div class="row">
                <div class="col-lg-6 mb-4">
                  @if($rHechos->count()<1)
                  <h4>No hizo reportes</h4>
                  @else
                  @foreach($rHechos as $reporteH)
                  <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                      <a href="{{$reporteH->ruta}}" class="link-limpio-blanco" target="_blank">{{$reporteH->title}}</a>
                      <div class="text-white-50 small">{{$reporteH->description}}</div>
                    </div>
                  </div>
                  <br>
                  @endforeach
                  {!! $rHechos->render()!!}
                  @endif
                </div>
                <div class="col-lg-6 mb-4">
                  @if($rRecibidos->count()<1)
                  <h4>No hizo reportes</h4>
                  @else
                  @foreach($rRecibidos as $reporteR)
                  <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                      <a href="{{$reporteR->ruta}}" class="link-limpio-blanco" target="_blank">{{$reporteR->title}}</a>
                      <div class="text-white-50 small">{{$reporteR->description}}</div>
                    </div>
                  </div>
                  <br>
                  @endforeach
                  {!! $rRecibidos->render()!!}
                  @endif
                </div>
              </div>
                {{-- Fin reportes --}}
            </div>
            {{-- Fin columna Publicaciones-Reportes --}}
        </div>

        {{-- fin row --}}
	</div>
</div>
@endsection