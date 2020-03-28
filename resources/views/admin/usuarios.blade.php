@extends('layouts.app')

@section('content')
<div class="container">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>
          <p class="mb-4">En esta sección se puede visualizar, editar y otorgar permisos a usuarios.</p>

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
                      <td>{{$usuario->name}}</td>
                      <td>{{$usuario->lastname}}</td>
                      <td>{{$usuario->email}}</td>
                      @if($usuario->type == "admin")
                      <td><span class="badge badge-danger">{{$usuario->type}}</span></td>
                      @else
                      <td><span class="badge badge-primary">{{$usuario->type}}</span></td>
                      @endif
                      <td>
                      	<a href="#" class="btn btn-warning btn-circle" title="Ver usuario">
		                   <i class="fas fa-eye"></i>
		                </a>
                      	<a href="#" class="btn btn-danger btn-circle" title="Eliminar usuario">
		                   <i class="fas fa-trash"></i>
		                </a>
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