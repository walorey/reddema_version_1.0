			<div class="card" style="max-width: 18rem;">
			  <div class="card-header text-center">Zona</div>

			   <div class="accordion" id="accordionZona">
				  <div class="card">
				    <div class="card-header" id="headingCABA">
				      <h2 class="mb-0 text-center">
				        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseCABA" aria-expanded="false" aria-controls="collapseCABA">
				          CABA
				        </button>
				      </h2>
				    </div>

				    <div id="collapseCABA" class="collapse show" aria-labelledby="headingCABA" data-parent="#accordionZona">
				      <div class="card-body">
				        {{-- <a class="dropdown-item active" href="#">Active link</a> --}}
				        @foreach($zones as $zone)
				        	@if($zone->id>0 && $zone->id<49)
  							<a class="dropdown-item text-center" href="#">{{$zone->name}}</a>
  							@endif
  						@endforeach
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingPBA">
				      <h2 class="mb-0 text-center">
				        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsePBA" aria-expanded="false" aria-controls="collapsePBA">
				          Provincia de Buenos Aires
				        </button>
				      </h2>
				    </div>
				    <div id="collapsePBA" class="collapse" aria-labelledby="headingPBA" data-parent="#accordionZona">
				      <div class="card-body">
				        @foreach($zones as $zone)
				        	@if($zone->id>48)
				        	<a class="dropdown-item text-center" href="#">{{$zone->name}}</a>
				        	@endif
				        @endforeach
				      </div>
				    </div>
				  </div>

			  </div>
			</div>