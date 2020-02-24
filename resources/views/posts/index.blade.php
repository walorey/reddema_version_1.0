@extends('layouts.app')

@section('content')
<div class="container">
	@foreach($posts as $post)
	<div class="card">
	  <div class="card-header">
	    <span>{{$post->category}}</span>
	    <span class="float-right">{{$post->user->name}} {{$post->user->lastname}}</span>
	  </div>
	  <div class="card-body">
	    <h5 class="card-title">{{$post->title}}</h5>
	    <p class="card-text">{{$post->description}}</p>
	    @foreach($post->images as $image)
	    <img src="{{Storage::url($image->ruta)}}" class="img-fluid" alt="Responsive image">
	    @endforeach
	    <a href="#" class="btn btn-primary">Ver más</a>
	  </div>
	</div>
	@endforeach
</div>
@endsection