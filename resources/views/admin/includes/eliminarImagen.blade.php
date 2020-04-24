<!-- Modal eliminar imagen-->
<div class="modal fade" id="modalEliminarImagen{{$imagen->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Eliminar imagen?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('eliminar.imagen', $imagen->id)}}" method="post" id="formEliminar{{$imagen->id}}">
                      @csrf
        </form>
        <img src="{{asset($imagen->ruta)}}" class="d-block w-100 imagen-carrusel" alt="...">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" form="formEliminar{{$imagen->id}}">Eliminar</button>
      </div>
    </div>
  </div>
</div>