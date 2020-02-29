			<div class="card border-light mb-3" style="max-width: 18rem;">
			  <div class="card-header" class="text-center">Filtros</div>
				  <div class="card-body">
				  	<form action="{{route('filtrar.post')}}" method="get">
				  		@csrf
				  		<label for="exampleFormControlSelect1">Categorías</label>
						<select class="form-control" id="exampleFormControlSelect1" name="category">

						@if(isset($category))
						  <option value="{{$category}}">{{$category}}</option>
						  <option value="">Seleccione una categoría</option>
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

						<br>

						<label for="exampleFormControlSelect1">Tipo de animal</label>
					    <select class="form-control" name="animal_type" id="exampleFormControlSelect1">

					    @if(isset($animal_type))
					      <option value="{{$animal_type}}">{{$animal_type}}</option>
					      <option value="">Seleccione el tipo de animal</option>
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

				  		<br>

						<label for="exampleFormControlSelect1">Zona</label>
					    <select class="form-control" name="zone" id="exampleFormControlSelect1">

					    @if(isset($zone))
					    	@foreach($zones as $lugar)
					    		@if($lugar->id == $zone)
					    		<option value="{{$lugar->id}}">{{$lugar->name}}</option>
					    		@endif
					    	@endforeach
					    	<option value="">Seleccione una zona</option>
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
					    @else
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
					    @endif
					    </select>

					    <br>

					    <button type="submit" class="btn btn-info">Ir</button>
				  	</form>

				  </div>
			</div>
