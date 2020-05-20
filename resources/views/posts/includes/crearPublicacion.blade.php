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
			    <label for="selectCategoria">Categoria</label>
			    <select class="form-control" id="selectCategoria" name="category">
			      @if(old('category'))
			      <option value="{{old('category')}}"selected>{{old('category')}}</option>
			      <option disabled>_________</option>
			      <option value="Adopción">Adopción</option>
			      <option value="Encuentro">Encuentro</option>
			      <option value="Estado crítico">Estado crítico</option>
			      <option value="Pérdida">Pérdida</option>
			      @else
			      <option disabled selected>Seleccione una categoría</option>
			      <option value="Adopción">Adopción</option>
			      <option value="Encuentro">Encuentro</option>
			      <option value="Estado crítico">Estado crítico</option>
			      <option value="Pérdida">Pérdida</option>
			      @endif
			    </select>
			  </div>
			   <div class="form-group">
			    <label for="selectTipoAnimal">Tipo de animal</label>
			    <select class="form-control" name="animal_type" id="selectTipoAnimal">
			      @if(old('animal_type'))
			      <option value="{{old('animal_type')}}" selected>{{old('animal_type')}}</option>
			      <option disabled>_________</option>
			      <option value="Canino">Canino</option>
			      <option value="Felino">Felino</option>
			      <option value="Ave">Ave</option>
			      <option value="Roedor">Roedor</option>
			      <option value="Equino">Equino</option>
			      <option value="Otro">Otro</option>
			      @else
			      <option disabled selected>Seleccione el tipo de animal</option>
			      <option value="Canino">Canino</option>
			      <option value="Felino">Felino</option>
			      <option value="Ave">Ave</option>
			      <option value="Roedor">Roedor</option>
			      <option value="Equino">Equino</option>
			      <option value="Otro">Otro</option>
				  @endif
			    </select>
			  </div>
			  <div class="form-group">
			  	<label>Provincia</label>
			  	<select class="form-control" id="provincia" name="provincia_id">
			  		<option value="">Seleccione una provincia</option>
			  		@foreach($provincias as $provincia)
			  			<option value="{{$provincia->id}}" {{ old('provincia_id') == $provincia->id ? "selected" : "" }}>
			  				{{$provincia->name}}
			  			</option>
			  		@endforeach
			  	</select>
			  </div>
			  <div class="form-group">
			  	<label>Partido/Departamento/Comuna</label>
			  	<select id="departamento" data-old="{{old('departamento')}}" name="departamento" class="form-control"></select>
			  </div>
			  <div class="form-group">
			    <label>Zona</label>
			    <select class="form-control" name="zone" id="zona">
{{-- 			    	<option disabled selected>Seleccione una zona</option>
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
			    	</optgroup> --}}
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlFile1">Imagenes</label>
			    <input type="file" name="images[]" multiple class="form-control-file" id="exampleFormControlFile1">
			  </div>
			<div class="form-group">
			    <label for="exampleFormControlTextarea1">Detalles</label>
			    <textarea maxlength="2000" name="description" placeholder="Deja detalles, datos de contacto, telefonos, emails o redes sociales" class="form-control"  rows="3">{{old('description')}}</textarea>
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