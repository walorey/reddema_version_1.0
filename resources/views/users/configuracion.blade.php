@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	@include('alertas')
            <div class="card">
                <div class="card-header">Configuración</div>

                <div class="card-body">

                    <h4>Cambiar email</h4>
                    <div class="form-group">
						<label>Email: {{Auth::user()->email}}</label>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEmail">Cambiar</button>
					</div>

                    <br>

                    <h4>Cambiar contraseña</h4>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalContra">Modificar</button>
                    </div>

                    <br>

                    <h4>Cuenta</h4>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminarCuenta">Eliminar cuenta</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Email -->
<div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="{{route('cambiar.email')}}" method="post" id="formEmail">
                @csrf
                <p>Deberas ingresar tu contreseña actual y verificar tu nuevo email para tener acceso a la página otra vez.</p>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Ingrese el nuevo email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña actual</label>
                    <input type="password" class="form-control" name="password_actual" placeholder="Ingrese su contraseña actual">
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" form="formEmail">Cambiar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Contraseña -->
<div class="modal fade" id="modalContra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('cambiar.contra')}}" id="formContra" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">Contraseña actual</label>
                <input type="password" class="form-control" name="password_actual" placeholder="Ingrese su contraseña actual">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contraseña nueva</label>
                <input type="password" class="form-control" name="password" placeholder="Ingresa la contraseña nueva">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Reingrese la contraseña</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Reingrese la nueva contraseña">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" form="formContra">Cambiar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Cuenta -->
<div class="modal fade" id="modalEliminarCuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar cuenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Estas seguro que quieres eliminar tu cuenta?</p>
        <p>Todo tu contenido será borrando, eso incluye publicaciones, y comentarios.</p>
        <p>Lamentamos mucho que tengas que irte, esperamos que vuelvas, la comunidad necesita de personas comprometidas a ayudar.</p>
        <form action="{{route('eliminar.cuenta')}}" method="post" id="formEliminarCuenta">
            @csrf
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="check" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    <b>Si, eliminar cuenta</b>
                </label>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger" form="formEliminarCuenta">Eliminar cuenta</button>
      </div>
    </div>
  </div>
</div>
@endsection