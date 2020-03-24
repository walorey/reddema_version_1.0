@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class="card">
			  <div class="card-header">
			  <span style="font-size: 19px;">{{$post->title}}</span>
			  <span class="float-right">{{$post->user->name}} {{$post->user->lastname}}</span>
			  </div>
			  <div class="card-body">
			    <p class="card-text">{{$post->description}}</p>
			    <div class="container">
					    	<div class="row">
						    @foreach($post->images as $image)

								<!-- Button trigger modal -->
								<a href="#"  data-toggle="modal" data-target="#image-{{$image->id}}">
								  <img src="{{asset($image->ruta)}}" class="img-thumbnail" style="width: 190px; height: 190px;">
								</a>

								<!-- Modal -->
								<div class="modal fade" id="image-{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <img src="{{asset($image->ruta)}}" class="img-thumbnail">
								      </div>
								    </div>
								  </div>
								</div>

						    @endforeach
						    </div>
					    </div>
			  </div>
			  <div class="card-footer">
			  	<span><i class="fas fa-list"></i> <a href="{{route('filtrar.categoria', $post->category)}}">{{$post->category}}</a></span>

			  	<span>|</span>

			  	<span><i class="fas fa-paw"></i> <a href="{{route('filtrar.tipoAnimal', $post->animal_type)}}">{{ $post->animal_type}}</a></span>

			  	<span>|</span>

			  	<span><i class="fas fa-map-marker-alt"></i><a href="{{route('filtrar.zona', [$post->zone->name,$post->zone->id])}}"> {{$post->zone->name}}</a></span>

			  	<span class="float-right">{{$post->created_at}}</span>

			  </div>
			</div>

			<br>

		{{-- 	comentarios --}}

			<h4>Comentarios</h4>

			@if($post->comments->count() == 0)

				<p>¡Sé el primero en comentar!</p>
			@else
					@foreach($post->comments as $comentario)
					<div class="media" style="background-color: #FFFFFF">
					  <img src="{{asset('img/avatar-comentario.jpg')}}" class="align-self-start mr-3" alt="..." style="width: 64px; height: 64px;">
					  <div class="media-body">
					    <h5 class="mt-2">{{$comentario->user->name}} {{$comentario->user->lastname}}</h5>
					    <p>{{$comentario->body}}</p>
						<p class="card-text"><small class="text-muted">{{$comentario->created_at}}</small></p>
					  </div>
					</div>
					<br>
					@endforeach
			@endif
			@if(session('mensaje'))
			<br>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>{{session('mensaje')}}</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			@endif

			<br>

			<div class="card border-info mb-3">
			  <div class="card-header">Comentar</div>
			  <div class="card-body text-info">
			  	<form action="{{route('post.comentar', $post->id)}}" method="post" >
			  		@csrf
			  	  <div class="form-group">
				    <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="3"></textarea>
				  </div>
				  <button type="submit" class="btn btn-outline-primary">Enviar</button>
			  	</form>
			  </div>
			</div>

		</div>
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
	</div>
</div>
@endsection