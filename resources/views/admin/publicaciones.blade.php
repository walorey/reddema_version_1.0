@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="h3 mb-2 text-gray-800">Publicaciones</h1>
    <p class="mb-4">En esta sección se puede visualizar todas las publicaciones, y eliminarlas si fuese necesario.</p>

    @include('alertas')

    <nav class="navbar navbar-light bg-light">
      <h6 class="m-0 font-weight-bold text-primary">Publicaciones</h6>
      <form class="form-inline" action="{{route('buscar.post.admin')}}" method="get">
        @csrf
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" name="busqueda" aria-label="Search">
        <button class="btn btn-primary" type="submit">
          <i class="fas fa-search fa-sm"></i>
        </button>
      </form>
    </nav>

    @foreach($posts as $post)
    <div class="row">
    	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">{{$post->user->name.' '.$post->user->lastname}}</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      {{-- <div class="dropdown-header">Dropdown Header:</div> --}}
                      <a class="dropdown-item text-center" href="{{route('mostrar.perfil', $post->user->slug)}}" target="_blank">Ver perfil de usuario</a>
                      <a class="dropdown-item text-center" href="{{route('posts.show', $post->id)}}" target="_blank">Ver publicación completa</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-center" href="#" data-target="#eliminarpostModal{{$post->id}}" data-toggle="modal">Eliminar</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                	<h2>{{$post->title}}</h2>
                	<p>{{$post->description}}</p>
                </div>
            </div>
        </div>
    </div>
    @include('admin.includes.eliminarPublicacion')
    @endforeach

    <a href="{{route('home.admin')}}" title="Volver"><button type="button" class="btn btn-secondary"><i class="fas fa-reply"></i></button></a>
</div>
@endsection