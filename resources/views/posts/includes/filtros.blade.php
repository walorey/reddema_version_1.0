			<button type="button" class="btn btn-outline-success btn-lg btn-block" data-toggle="modal" data-target="#modalPublicar">Publicar</button>
			<br>
			<div class="accordion" id="accordionCategoria">
			  <div class="card">
			    <div class="card-header" id="headingCategoria">
			      <h2 class="mb-0 text-center">
			        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseCategoria" aria-expanded="true" aria-controls="collapseCategoria">
			          Categorías
			        </button>
			      </h2>
			    </div>
			  </div>
			  <div id="collapseCategoria" class="collapse show" aria-labelledby="headingCategoria" data-parent="#accordionCategoria">
		      <div class="card-body">
		      	<a class="dropdown-item text-center" href="#">Adopción</a>
				{{-- <a class="dropdown-item active" href="#">Active link</a> --}}
				<a class="dropdown-item text-center" href="#">Encuentro</a>
				<a class="dropdown-item text-center" href="#">Estado crítico</a>
				<a class="dropdown-item text-center" href="#">Pérdida</a>
		      </div>
		    </div>
		  </div>
		  <div class="accordion" id="accordionTA">
			  <div class="card">
			    <div class="card-header" id="headingTA">
			      <h2 class="mb-0 text-center">
			        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTA" aria-expanded="true" aria-controls="collapseTA">
			          Tipo de animal
			        </button>
			      </h2>
			    </div>
			  </div>
			  <div id="collapseTA" class="collapse show" aria-labelledby="headingTA" data-parent="#accordionTA">
		      <div class="card-body">
			  	<a class="dropdown-item text-center" href="#">Canino</a>
				{{-- <a class="dropdown-item active" href="#">Active link</a> --}}
				<a class="dropdown-item text-center" href="#">Felino</a>
				<a class="dropdown-item text-center" href="#">Ave</a>
				<a class="dropdown-item text-center" href="#">Roedor</a>
				<a class="dropdown-item text-center" href="#">Equino</a>
				<a class="dropdown-item text-center" href="#">Otro</a>
		      </div>
		    </div>
		  </div>