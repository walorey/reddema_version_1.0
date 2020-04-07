<div class="modal fade" id="modalReport{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reportar publicación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('reports.make', $post->id)}}" method="post" id="reportPost{{$post->id}}">
          @csrf
          <div class="form-group">
            <label for="formGroupExampleInput">Título</label>
            <input type="text" class="form-control" name="title" placeholder="Dinos el motivo">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descripción</label>
            <textarea class="form-control" name="description" placeholder="Detallanos más"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger" form="reportPost{{$post->id}}">Reportar</button>
      </div>
    </div>
  </div>
</div>