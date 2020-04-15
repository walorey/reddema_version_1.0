@extends('layouts.app')
@section('content')
<div class="container">

		@if (session('mensaje'))
	    <div class="alert alert-success fade show">
	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			</button>
	        <ul>
				{{session('mensaje')}}
	        </ul>
	    </div>
		@endif
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

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Editar perfil
				</div>
				<div class="card-body">
					<p class="h1 text-center">{{Auth::user()->name.' '.Auth::user()->lastname}}</p>
					<form action="{{route('actualizar.perfil')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Imagen de perfil</label>
							<img src="{{asset(Auth::user()->avatar)}}" style="width: 200px; height: 200px;" class="rounded  mx-auto d-block" alt="...">
							<br>
							<input type="file" name="avatar" class="mx-auto d-block">
						</div>
						<div class="form-group">
							<label>Cuenta un poco sobre vos</label>
							<textarea  name="descripcion" class="form-control" maxlength="188">{{Auth::user()->descripcion}}</textarea>
						</div>
						<button type="submit" class="btn btn-outline-primary">Guardar cambios</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection