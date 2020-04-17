<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog"  id="eliminarPost{{$post->id}}" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm" role="document">
			    <div class="modal-content">
			      	<div class="modal-header">
			        	<h5 class="modal-title" id="exampleModalLabel">¿Eliminar esta publicación?</h5>
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          		<span aria-hidden="true">&times;</span>
			        	</button>
			   		</div>
			   		<div class="modal-footer">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
			        	{{-- <button type="button" class="btn btn-primary">Eliminar</button> --}}
			        	<form class="d-inline" method="POST" action="{{route('posts.destroy', $post->id)}}">
			      		@method('DELETE')
			      		@csrf
			      		<button type="submit"  class="btn btn-primary">Eliminar</button>
			      		</form>
			       </div>
			  	</div>
			</div>
</div>