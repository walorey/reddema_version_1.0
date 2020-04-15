<div class="modal fade" id="modalReport{{$pendiente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			    <h5 class="modal-title" id="exampleModalLabel">Resolver reporte</h5>
			     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			         <span aria-hidden="true">&times;</span>
			     </button>
			</div>
			<div class="modal-body">
			    <form action="{{route('reports.resolver', $pendiente->id)}}" method="post" id="report{{$pendiente->id}}">
			    	@method('POST')
			        @csrf
			        <div class="form-group">
			            <label for="message-text" class="col-form-label">¿Cómo se resolvió el problema?</label>
			            <textarea class="form-control" name="solucion" placeholder="Describe la solución" required maxlength="255"></textarea>
			        </div>
			    </form>
			</div>
			<div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			        <button type="submit" class="btn btn-danger" form="report{{$pendiente->id}}">Resolver</button>
			</div>
		</div>
	</div>
</div>