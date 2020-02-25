@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
			<div class="card border-light mb-3" style="max-width: 18rem;">
			  <div class="card-header text-center">Categorías</div>
			  <div class="card-body">
				<a class="dropdown-item text-center" href="#">Adopción</a>
				{{-- <a class="dropdown-item active" href="#">Active link</a> --}}
				<a class="dropdown-item text-center" href="#">Encuentro</a>
				<a class="dropdown-item text-center" href="#">Estado crítico</a>
				<a class="dropdown-item text-center" href="#">Pérdida</a>
			  </div>
			</div>
			<div class="card border-light mb-3" style="max-width: 18rem;">
			  <div class="card-header text-center">Tipo de animal</div>
			  <div class="card-body">
			  </div>
			</div>
		</div>
		<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
			@foreach($posts as $post)
			<div class="card">
			  <div class="card-header">
			    <span>{{$post->category}}</span>
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
						  <img src="{{Storage::url($image->ruta)}}" class="img-thumbnail" style="width: 250px; height: 250px;">
						</a>

						<!-- Modal -->
						<div class="modal fade" id="image-{{$image->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
			</div>
			<br>
			@endforeach
			{!! $posts->render()!!}
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="card border-dark mb-3" style="max-width: 18rem;">
			  <div class="card-header text-center">Zona</div>

			   <div class="accordion" id="accordionExample">
				  <div class="card">
				    <div class="card-header" id="headingOne">
				      <h2 class="mb-0 text-center">
				        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
				          CABA
				        </button>
				      </h2>
				    </div>

				    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
				      <div class="card-body">
				        {{-- <a class="dropdown-item active" href="#">Active link</a> --}}
				        @foreach($zones as $zone)
				        	@if($zone->id>0 && $zone->id<49)
  							<a class="dropdown-item text-center" href="#">{{$zone->name}}</a>
  							@endif
  						@endforeach
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingTwo">
				      <h2 class="mb-0 text-center">
				        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				          Provincia de Buenos Aires
				        </button>
				      </h2>
				    </div>
				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				      <div class="card-body">
				        @foreach($zones as $zone)
				        	@if($zone->id>48)
				        	<a class="dropdown-item text-center" href="#">{{$zone->name}}</a>
				        	@endif
				        @endforeach
				      </div>
				    </div>
				  </div>

			  </div>
			</div>
		</div>
	</div>
</div>
@endsection