@extends('layouts.app')
@section('content')
	<div class="container">
		@include('alertas')
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
				  <div class="card-header">
				    Presentación
				    <span class="float-right">
				    	<div class="dropdown">
						  <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
						  </a>
						  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
						  	@if(Auth::user()->id == $usuario->id)
						    <a class="dropdown-item" href="{{route('editar.perfil')}}">Editar perfil</a>
						    @else
						    <a class="dropdown-item" type="button" data-toggle="modal" data-target="#modalReport" href="#">Reportar</a>
						    @endif
						  </div>
						</div>
				    </span>
				  </div>
				  <div class="card-body">

					  <div class="row no-gutters">
					    <div class="col-md-4">
					      <img src="{{asset($usuario->avatar)}}" class="card-img rounded-circle mx-auto d-block" style="width: 170px; height: 170px;" alt="...">
					    </div>
					    <div class="col-md-8">
					      <div class="card-body">
					        <p class="h2 text-center">{{$usuario->name.' '.$usuario->lastname}}</p>
					        <p>{{$usuario->descripcion}}</p>
					        <button type="button" class="btn btn-secondary"  data-toggle="modal" data-target="#modalMensaje">Mensaje <i class="fas fa-envelope"></i></button>
					      </div>
					    </div>

					</div>
				  </div>
				</div>

				<br>


			<!-- Image and text -->
			<nav class="navbar navbar-light separador-perfil rounded">
				<a href="#" class="navbar-brand">
					<img src="{{asset('img/ico.png')}}" width="25" height="25" class="d-inline-block align-top" alt="">
					<span class="text-light">Publicaciones de {{$usuario->name.' '.$usuario->lastname}}</span>

				</a>
			</nav>

			<br>

			@foreach($posts as $post)
				<div class="card mb-3">
				  <div class="card-header">
				    <span><i class="fas fa-list-ul"></i> <a href="{{route('filtrar.categoria', $post->category)}}">{{$post->category}}</a></span>
				    <span>|</span>
				    <span><i class="fas fa-paw"></i> <a href="{{route('filtrar.tipoAnimal' ,$post->animal_type)}}">{{$post->animal_type}}</a>
				    </span>
				    <span>|</span>
				    <span>
				    	<i class="fas fa-map-marker-alt"></i>

				      	<a href="{{route('filtrar.zona',  [$post->zone->name,$post->zone->id])}}">
				      		{{$post->zone->name}}
				      	</a>
					</span>
					<span>|</span>
					<span>{{$post->created_at}}</span>
				  	@if($post->user->id == Auth::user()->id)
					<span class="float-right">
				  	  <div class="dropdown no-arrow">
	                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
	                    </a>
	                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
	                      <a class="dropdown-item text-center" href="{{route('posts.edit', $post->slug)}}">Editar</a>
	                      <a class="dropdown-item text-center" href="{{route('exportar.post', $post->slug)}}" target="_blank">Imprimir</a>
	                      <div class="dropdown-divider"></div>
	                      <a class="dropdown-item text-center" type="button" data-toggle="modal" data-target=".bd-example-modal-sm">Eliminar</a>
	                    </div>
	                  </div>
				  	</span>
					@else
					<span class="float-right">
				  	  <div class="dropdown no-arrow">
	                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
	                    </a>
	                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
	                      <a class="dropdown-item text-center" type="button" data-toggle="modal" data-target="#modalReport{{$post->id}}" href="#">Reportar</a>
	                    </div>
	                  </div>
	                 </span>
					@endif
					<span class="float-right"><a href="{{route('mostrar.perfil', $post->user->slug)}}">{{$post->user->name}} {{$post->user->lastname}}</a></span>

				  </div>

				  <div class="card-body">
				    <h5 class="card-title">{{$post->title}}</h5>
				    <p class="card-text">
				    	{{substr($post->description, 0,197)}}
				    	@if(strlen($post->description)>197)
				    		<b>...</b>
				    		<a href="{{route('posts.show', $post->slug)}}">Ver más</a>
				    	@endif
				    </p>
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
							    {{-- <div class="modal-content"> --}}
							      {{-- <div class="modal-header"> --}}
							        <button type="button" class="close btn-cerrar-modal btn-circle" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      {{-- </div> --}}
							      <div class="modal-body">
							        <img src="{{asset($image->ruta)}}" class="img-thumbnail">
							      </div>
							    {{-- </div> --}}
							  </div>
							</div>
				    	@endforeach
				    	</div>
			    	</div>
			  	</div>
				    <div class="card-footer text-muted">
				    	<i class="fas fa-comment"></i>
				    	<a href="{{route('posts.show', $post->slug)}}">Comentar</a>
					 </div>
				</div>

			<br>
			@include('posts.includes.eliminarPublicacion')
			@include('posts.includes.reportarPublicacion')
			@endforeach

			{!! $posts->render()!!}

			</div>
		</div>





	||||@if(Auth::user()->id !== $usuario->id)
		{{-- reportar perfil --}}

		<div class="modal fade" id="modalReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Reportar perfil</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="{{route('reports.perfil.make', $usuario->id)}}" method="post" id="reportPost">
		          @csrf
		          <div class="form-group">
		            <label for="formGroupExampleInput">Título</label>
		            <input type="text" class="form-control" name="title" placeholder="Dinos el motivo">
		          </div>
		          <div class="form-group">
		            <label for="message-text" class="col-form-label">Descripción</label>
		            <textarea class="form-control" name="description" placeholder="Detallanos más"></textarea>
		          </div>
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button type="submit" class="btn btn-danger" form="reportPost">Reportar</button>
		      </div>
		    </div>
		  </div>
		</div>
		@endif

		{{-- modal enviar mensaje --}}

		<!-- Modal -->
		<div class="modal fade" id="modalMensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Mensaje nuevo</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form id="formMensaje" method="post" action="{{route('newConversation', $usuario->id)}}">
		          @csrf
				  <div class="form-group">
				    <label for="exampleFormControlInput1">Asunto</label>
				    <input type="text" name="subject" class="form-control">
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1">Mensaje</label>
				    <textarea class="form-control" name="body" rows="3"></textarea>
				  </div>
				</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		        <button type="submit" class="btn btn-secondary" form="formMensaje">Enviar</button>
		      </div>
		    </div>
		  </div>
		</div>

	</div>
@endsection