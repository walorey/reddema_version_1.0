@extends('layouts.app')

@section('content')
<div class="container">
        @include('alertas')
        <div class="container-fluid">

          <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>

          <p class="mb-4">En esta sección se puede visualizar, editar y otorgar permisos a usuarios.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">

              <nav class="navbar navbar-light bg-light">
                <h6 class="m-0 font-weight-bold text-primary">Lista de usuarios</h6>
                <form class="form-inline" action="{{route('buscar.user.admin')}}" method="get">
                  @csrf
                  @if(isset($busqueda))
                  <input name="busqueda" value="{{$busqueda}}" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                  @else
                  <input name="busqueda"  class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                  @endif
                  <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                  </button>
                </form>
              </nav>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Email</th>
                      <th>Tipo</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($usuarios as $usuario)
                  	<tr>
                      <td>{{$usuario->id}}</td>
                      <td>{{$usuario->name}}</td>
                      <td>{{$usuario->lastname}}</td>
                      <td>{{$usuario->email}}</td>
                      @if($usuario->type == "admin")
                      <td><span class="badge badge-danger">{{$usuario->type}}</span></td>
                      @else
                      <td><span class="badge badge-primary">{{$usuario->type}}</span></td>
                      @endif
                      <td>
                      	<a href="{{route('ver.actividad', $usuario->slug)}}" class="btn btn-warning btn-circle" title="Ver actividad" target="_blank">
		                      <i class="fas fa-eye"></i>
		                    </a>
                      	<a href="#" class="btn btn-danger btn-circle" title="Eliminar usuario" data-toggle="modal" data-target="#eliminarUsuarioModal{{$usuario->id}}">
		                      <i class="fas fa-trash"></i>
		                    </a>
                        @include('admin.includes.eliminarUsuario')
                      </td>
                    </tr>
                  	@endforeach
                  </tbody>
                </table>
                {!! $usuarios->appends(Request::only(['name', 'lastname', 'email', 'busqueda']))->render()!!}
              </div>
            </div>
          </div>

          <a href="{{route('home.admin')}}" title="Volver"><button type="button" class="btn btn-secondary"><i class="fas fa-reply"></i></button></a>

        </div>
        <!-- /.container-fluid -->
</div>
@endsection