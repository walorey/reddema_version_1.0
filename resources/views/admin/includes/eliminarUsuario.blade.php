<div class="modal fade" id="eliminarUsuarioModal{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Eliminar este usuario?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Si eliminas un usuario toda su actividad será borrada.</p>
        <p>Usuarios que violan nuestras <a href="#" target="_blank">políticas y normas de seguridad</a> son los que reciben esta sanción.</p>
        <p>Por eso analiza bien la situación y reconsidera si este usuario debe ser borrado.</p>
        <form action="{{route('eliminar.usuario', $usuario->id)}}" method="post" id="eliminarUsuarioForm{{$usuario->id}}">
          @csrf
          {{-- <input type="text" name="idUser" value="{{$usuario->id}}" hidden> --}}
          <div class="form-group">
            <label for="motivo" class="col-form-label">Motivo:</label>
            <textarea class="form-control" name="motivo"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input type="password" class="form-control" name="password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Reingrese la contraseña</label>
            <input type="password" class="form-control" name="password_confirmation">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger" form="eliminarUsuarioForm{{$usuario->id}}">Eliminar</button>
      </div>
    </div>
  </div>
</div>



