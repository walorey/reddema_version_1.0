<!-- Modal -->
<div class="modal fade" id="modalPublicar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Publicar algo en Reddema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
{{-- 			<h1>Publicar algo en Reddema</h1> --}}
			<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data" >
			  @csrf
			  <div class="form-group">
			  	<label>Título</label>
			  	<input class="form-control" name="title" type="text" placeholder="Perro negro perdido, Encontre un gato..." value="{{old('title')}}">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlSelect1">Categoria</label>
			    <select class="form-control" id="exampleFormControlSelect1" name="category">
			      <option value="Adopción">Adopción</option>
			      <option value="Encuentro">Encuentro</option>
			      <option value="Estado crítico">Estado crítico</option>
			      <option value="Pérdida">Pérdida</option>
			    </select>
			  </div>
			   <div class="form-group">
			    <label for="exampleFormControlSelect1">Tipo de animal</label>
			    <select class="form-control" name="animal_type" id="exampleFormControlSelect1">
			      <option value="Canino">Canino</option>
			      <option value="Felino">Felino</option>
			      <option value="Ave">Ave</option>
			      <option value="Roedor">Roedor</option>
			      <option value="Equino">Equino</option>
			      <option value="Otro">Otro</option>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlSelect1">Zona</label>
			    <select class="form-control" name="zone" id="exampleFormControlSelect1">
			    	<option disabled selected>Seleccione una zona</option>
			    	<optgroup label="CABA">
				    	@foreach($zones as $zone)
				    		@if($zone->id>0 && $zone->id<49)
				    		<option value="{{$zone->id}}">{{$zone->name}}</option>
				    		@endif
				    	@endforeach
			    	</optgroup>
			    	<optgroup label="Buenos Aires Provincia">
				    	@foreach($zones as $zone)
				    		@if($zone->id>50)
								<option  value="{{$zone->id}}">{{$zone->name}}</option>
				    		@endif
				    	@endforeach
			    	</optgroup>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlFile1">Imagenes</label>
			    <input type="file" name="images[]" multiple class="form-control-file" id="exampleFormControlFile1">
			  </div>
			<div class="form-group">
			    <label for="exampleFormControlTextarea1">Detalles</label>
			    <textarea name="description" placeholder="Deja detalles, datos de contacto, telefonos, emails o redes sociales" class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" value="{{old('description')}}"></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary">Publicar</button>
			</form>
		</div>
      </div>
{{--       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>