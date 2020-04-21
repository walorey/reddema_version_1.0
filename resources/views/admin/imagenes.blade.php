@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<h1>Imagenes</h1>
			<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			  			@php
			  			$c=0;
			  			@endphp
			  		    @foreach($imagenes as $imagen)
			  		    @if($c==0)
					    <div class="carousel-item active" data-interval="10000">
					      <img src="{{asset($imagen->ruta)}}" class="d-block w-100 imagen-carrusel" alt="...">
					      <div class="carousel-caption d-none d-md-block p-3 mb-2 bg-dark text-white rounded-pill">
					        <h5>{{$imagen->post->title}}</h5>
					        <p><a href="{{route('posts.show',$imagen->post->slug)}}" target="_blank">Ver publicación</a></p>
					        <p>
					        	<form action="{{route('eliminar.imagen', $imagen->id)}}" method="post">
					        		@csrf

					        		<button type="submit" class="btn btn-danger">Eliminar</button>
					        	</form>
					        </p>
					      </div>
					    </div>
					    @else
					    <div class="carousel-item" data-interval="10000">
					      <img src="{{asset($imagen->ruta)}}" class="d-block w-100 imagen-carrusel" alt="...">
					      <div class="carousel-caption d-none d-md-block p-3 mb-2 bg-dark text-white rounded-pill">
					        <h5>{{$imagen->post->title}}</h5>
					        <p><a href="{{route('posts.show',$imagen->post->slug)}}" target="_blank">Ver publicación</a></p>
					        <p>
					        	<form action="{{route('eliminar.imagen', $imagen->id)}}" method="post">
					        		@csrf

					        		<button type="submit" class="btn btn-danger">Eliminar</button>
					        	</form>
					        </p>
					      </div>
					    </div>
					    @endif
					    @php
					    $c++;
					    @endphp
			    	    @endforeach
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
	</div>
</div>

@endsection