@extends('layouts.app')

@section('content')
<div class="container">
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Panel administrativo</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Usuarios card -->
            <div class="col-xl-3 col-md-6 mb-4">
            	<a href="{{route('users.index')}}" class="link-limpio">
            		<div class="card border-left-primary shadow h-100 py-2">
		                <div class="card-body">
		                  <div class="row no-gutters align-items-center">
		                    <div class="col mr-2">
		                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Usuarios</div>
		                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$usuarios}}</div>
		                    </div>
		                    <div class="col-auto">
		                      <i class="fas fa-users fa-2x text-gray-300"></i>
		                    </div>
		                  </div>
		                </div>
	              </div>
            	</a>
            </div>

            <!-- Publicaciones card -->
           	<div class="col-xl-3 col-md-6 mb-4">
	           	<a href="{{route('admin.posts.index')}}" class="link-limpio">
	              <div class="card border-left-success shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Publicaciones</div>
	                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$publicaciones}}</div>
	                    </div>
	                    <div class="col-auto">
	                      <i class="fas fa-clone fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </a>
            </div>

            <!-- Imagenes card -->
            <div class="col-xl-3 col-md-6 mb-4">
            	<a href="{{route('ver.imagenes')}}" class="link-limpio">
		            <div class="card border-left-info shadow h-100 py-2">
		                <div class="card-body">
		                  <div class="row no-gutters align-items-center">
		                    <div class="col mr-2">
		                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Imagenes</div>
		                      <div class="row no-gutters align-items-center">
		                        <div class="col-auto">
		                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$imagenes}}</div>
		                        </div>
		{{--                         <div class="col">
		                          <div class="progress progress-sm mr-2">
		                            <div class="progress-bar bg-info" role="progressbar" style="width: 90%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
		                          </div>
		                        </div> --}}
		                      </div>
		                    </div>
		                    <div class="col-auto">
		                      <i class="fas fa-images fa-2x text-gray-300"></i>
		                    </div>
		                  </div>
		                </div>
		              </div>
            	</a>
            </div>

            <!-- Comentarios card -->
            <div class="col-xl-3 col-md-6 mb-4">
            	<a href="{{route('ver.comentarios')}}" class="link-limpio">
		            <div class="card border-left-warning shadow h-100 py-2">
		                <div class="card-body">
		                  <div class="row no-gutters align-items-center">
		                    <div class="col mr-2">
		                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Comentarios</div>
		                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$comentarios}}</div>
		                    </div>
		                    <div class="col-auto">
		                      <i class="fas fa-comments fa-2x text-gray-300"></i>
		                    </div>
		                  </div>
		                </div>
		            </div>
              </a>
		        </div>


          </div>

          {{-- fin row --}}

          {{-- row --}}
          <div class="row">

            <!-- Reportes card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{route('reports.index')}}" class="link-limpio">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Reportes</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$reportesPendientes}}</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                </div>
              </a>
            </div>

          </div>
          {{-- fin row --}}



        </div>
        <!-- /.container-fluid -->

</div>
@endsection