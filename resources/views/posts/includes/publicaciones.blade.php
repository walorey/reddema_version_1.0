			@foreach($posts as $post)
			<div class="card border-info mb-3">
			  <div class="card-header">
			    <span>{{$post->category}}</span>
			    <span class="float-right">{{$post->zone->name}}</span>
			  </div>
			  <div class="card-body">
			    <h5 class="card-title">{{$post->title}}</h5>
			    <p class="card-text">{{$post->description}}</p>
			    <div class="container">
			    	<div class="row">
				    @foreach($post->images as $image)

						<!-- Button trigger modal -->
						<a href="#"  data-toggle="modal" data-target="#image-{{$image->id}}">
						  <img src="{{Storage::url($image->ruta)}}" class="img-thumbnail" style="width: 190px; height: 190px;">
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
						        <img src="{{Storage::url($image->ruta)}}" class="img-thumbnail">
						      </div>
						    </div>
						  </div>
						</div>

				    @endforeach
				    </div>
			    </div>

			    {{-- <a href="#" class="btn btn-primary">Ver más</a> --}}
			  </div>
			    <div class="card-footer text-muted">
				    <span class="float-left">{{$post->user->name}} {{$post->user->lastname}}</span>
				    <span class="float-right">{{$post->created_at}}</span>
				 </div>
			</div>
			<br>
			@endforeach
			{!! $posts->render()!!}