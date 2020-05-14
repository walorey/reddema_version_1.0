<div class="card border-light mb-3 filtros-browser" style="max-width: 18rem;">
	<div class="card-header" class="text-center"><i class="fas fa-filter"></i> Filtros</div>
	<div class="card-body">
		<form action="{{route('filtrar.post')}}" method="get">
			@csrf

            @if(isset($busqueda))
            <label>Buscar por palabra</label>
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" name="busqueda" aria-label="Search" value="{{$busqueda}}">
            @else
            <label>Buscar por palabra</label>
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" name="busqueda" aria-label="Search">
            @endif

            <br>

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
			<label>Provincia</label>
			<select class="form-control" id="provinciaFiltro" name="provincia_id">
			  	<option value="">Seleccione una provincia</option>
			  	@foreach($provincias as $provincia)
			  	<option value="{{$provincia->id}}">
			  		{{$provincia->name}}
			  	</option>
			  	@endforeach
			</select>

			<br>
			<label>Partido/Departamento/Comuna</label>
			<select class="form-control" id="departamentoFiltro" name="departamento"></select>

			<br>

			<label for="exampleFormControlSelect1">Zona</label>
			<select class="form-control" name="zone" id="zonaFiltro">

{{-- 			@if(isset($lugar))
				@foreach($zones as $zone)
					@if($zone->id == $lugar)
					<option value="{{$zone->id}}">{{$zone->name}}</option>
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
			@endif --}}
			</select>

			<br>

			<button type="submit" class="btn btn-info">Ir</button>
		</form>

	</div>
</div>


{{-- parte movil --}}
<div class="accordion filtros-movil" id="accordionFiltros">
  <div class="card">
    <div class="card-header" id="headingFiltros">
      <h2 class="mb-0">
        <button class="btn" type="button" data-toggle="collapse" data-target="#collapseFiltros" aria-expanded="false" aria-controls="collapseOne">
          <i class="fas fa-filter"></i> Filtros
        </button>
      </h2>
    </div>

    <div id="collapseFiltros" class="collapse" aria-labelledby="headingFiltros" data-parent="#accordionFiltros">
      <div class="card-body">
      		<form action="{{route('filtrar.post')}}" method="get">
				  		@csrf

                        @if(isset($busqueda))
                        	<label>Buscar por palabra</label>
                        	<input class="form-control mr-sm-2" type="search" placeholder="Buscar" name="busqueda" aria-label="Search" value="{{$busqueda}}">
                        @else
                        	<label>Buscar por palabra</label>
                            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" name="busqueda" aria-label="Search">
                        @endif

                        <br>

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
{{--
					    @if(isset($lugar))
					    	@foreach($zones as $zone)
					    		@if($zone->id == $lugar)
					    		<option value="{{$zone->id}}">{{$zone->name}}</option>
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
					    @endif --}}
					    </select>

				<br>

			<button type="submit" class="btn btn-info">Ir</button>
		</form>
      </div>
    </div>
  </div>
</div>