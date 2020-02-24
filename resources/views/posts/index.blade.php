@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
			<div class="card border-light mb-3" style="max-width: 18rem;">
			  <div class="card-header">Categorías</div>
			  <div class="card-body">
			    <div class="btn-group-vertical">
			    	<button type="button" class="btn btn-secondary">Adopciones</button>
			    	<button type="button" class="btn btn-secondary">Encuentros</button>
			    	<button type="button" class="btn btn-secondary">Estado crítico</button>
			    	<button type="button" class="btn btn-secondary">Pérdidas</button>
				</div>
			  </div>
			</div>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			@foreach($posts as $post)
			<div class="card">
			  <div class="card-header">
			    <span>{{$post->category}}</span>
			    <span class="float-right">{{$post->user->name}} {{$post->user->lastname}}</span>
			  </div>
			  <div class="card-body">
			    <h5 class="card-title">{{$post->title}}</h5>
			    <p class="card-text">{{$post->description}}</p>
			    <div class="row">
			    @foreach($post->images as $image)



					<!-- Button trigger modal -->
					<button type="button"  data-toggle="modal" data-target="#image-{{$image->id}}">
					  <img src="{{Storage::url($image->ruta)}}" class="img-thumbnail" style="width: 200px; height: 200px;">
					</button>

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
			    {{-- <a href="#" class="btn btn-primary">Ver más</a> --}}
			  </div>
			</div>
			<br>
			@endforeach
		</div>
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">

		</div>
	</div>
</div>
@endsection