@extends('layouts.app')
@section('content')
	<div class="container">
{{-- 		<h1 class="text-center">Pruebas de perfiles </h1>

		<h3 class="text-center">Modelo 1</h3> --}}

		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
				  <div class="card-header">
				    Presentación
				  </div>
				  <div class="card-body">

					  <div class="row no-gutters">
					    <div class="col-md-4">
					      <img src="{{asset('/img/avatares/avatar.jpg')}}" class="card-img rounded-circle mx-auto d-block" style="width: 170px; height: 170px;" alt="...">
					    </div>
					    <div class="col-md-8">
					      <div class="card-body">
					        <p class="h2 text-center">{{$usuario->name.' '.$usuario->lastname}}</p>
					        <p>Me considero proactivo, tuve malas experiencias con gatos de chico, ahora me dan lo mismo, pero todo bien. A los perros me los banco. Tengo un mezcla de labrador que se llama 'negro', bah.</p>
					      </div>
					    </div>

					</div>
				  </div>
				</div>
			</div>
		</div>

	</div>
@endsection