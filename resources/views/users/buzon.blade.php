@extends('layouts.app')
@section('content')
<div class="container">
	<h1>Buzon de mensajes</h1>
	<div class="list-group">

		{{-- para cuando hay un mensaje no leido --}}
{{-- 	  <a href="#" class="list-group-item list-group-item-action active">
	    <div class="d-flex w-100 justify-content-between">
	      <h5 class="mb-1">List group item heading</h5>
	      <small>3 days ago</small>
	    </div>
	    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
	    <small>Donec id elit non mi porta.</small>
	  </a> --}}
	  @if(isset($aviso))
	  <h3>{{$aviso}}</h3>
	  @else
		  @foreach($users as $user)
		  <a href="{{route('verConversacion', $user->slug)}}" class="list-group-item list-group-item-action">
		    <div class="d-flex w-100 justify-content-between">
		      <h5 class="mb-1">{{$user->name.' '.$user->lastname}}</h5>
		      <small class="text-muted">3 days ago</small>
		    </div>
		    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
		    <small class="text-muted">Donec id elit non mi porta.</small>
		  </a>
		  @endforeach
	  @endif
	</div>
</div>
@endsection