			@foreach($posts as $post)
			<div class="card border-info mb-3">
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
                      <a class="dropdown-item text-center" href="#">Editar</a>
                      <a class="dropdown-item text-center" href="#">Imprimir</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-center" href="#">Eliminar</a>
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
                      <a class="dropdown-item text-center" href="#">Reportar</a>
                    </div>
                  </div>
                 </span>
				@endif
				<span class="float-right">{{$post->user->name}} {{$post->user->lastname}}</span>

			  </div>

			  <div class="card-body">
			    <h5 class="card-title">{{$post->title}}</h5>
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
			    	<a href="{{route('posts.show', $post->id)}}">Comentar</a>
				 </div>
			</div>
			<br>

			@endforeach
			{!! $posts->appends(Request::only(['category', 'animal_type', 'zone']))->render()!!}