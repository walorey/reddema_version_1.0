@extends('layouts.app')

@section('content')
<div class="container">
	@if ($errors->any())
    <div class="alert alert-danger fade show">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
			<button type="button" class="btn btn-outline-success btn-lg btn-block" data-toggle="modal" data-target="#modalPublicar">Publicar</button>
			<br>
			@include('posts.includes.filtros')
		</div>
		<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
			@include('posts.includes.publicaciones')
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			@include('posts.includes.zonas')
		</div>
	</div>
</div>

@include('posts.includes.crearPublicacion')

@endsection