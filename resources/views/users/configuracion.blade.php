@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	@include('alertas')
            <div class="card">
                <div class="card-header">Configuración</div>

                <div class="card-body">
                    <form action="{{route('users.update', Auth::user()->id)}}" method="post">
                    	@method('PUT')
                    	@csrf
                    	<h4>Cambiar email</h4>
                    	<div class="form-group">
						    <label>Email</label>
						    <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
						</div>

                    	<br>

                    	<h4>Cambiar contraseña</h4>
                    	<div class="form-group">
						    <label for="exampleInputPassword1">Contraseña actual</label>
						    <input type="password" class="form-control" name="password_actual">
						</div>
						<div class="form-group">
						    <label for="exampleInputPassword1">Contraseña nueva</label>
						    <input type="password" class="form-control" name="password">
						</div>
						<div class="form-group">
						    <label for="exampleInputPassword1">Reingrese la contraseña</label>
						    <input type="password" class="form-control" name="password_confirmation">
						</div>
						  <button type="submit" class="btn btn-primary">Modificar</button>
                    </form>
                    <h4>Eliminar cuenta</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection