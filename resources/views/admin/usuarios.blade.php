@extends('layouts.app')

@section('content')
<div class="container">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>
          <p class="mb-4">En esta sección se puede visualizar, editar y otorgar permisos a usuarios.</p>

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
            @if (session('mensaje'))
              <div class="alert alert-warning fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
                  <ul>
                {{session('mensaje')}}
                  </ul>
              </div>
            @endif
            @if (session('alerta'))
              <div class="alert alert-danger fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
                  <ul>
                {{session('alerta')}}
                  </ul>
              </div>
            @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Lista de usuarios</h6>
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
                      	<a href="#" class="btn btn-warning btn-circle" title="Ver actividad">
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
                {!! $usuarios->render()!!}
              </div>
            </div>
          </div>



        </div>
        <!-- /.container-fluid -->
</div>
@endsection