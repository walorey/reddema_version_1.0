@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<h2>Editar publicación</h2>
			@include('alertas')
			<form method="post" action="{{route('posts.update', $post->id)}}">
			  @csrf
			  @method('PUT')
			  <div class="form-group">
			    <label for="inputTitulo">Título</label>
			    <input class="form-control" type="text" value="{{$post->title}}" name="title">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlSelect1">Categoria</label>
			    <select class="form-control" id="exampleFormControlSelect1" name="category">
			      <option selected value="{{$post->category}}">{{$post->category}}</option>
			      <option disabled>Seleccione una categoría</option>
			      <option value="Adopción">Adopción</option>
			      <option value="Encuentro">Encuentro</option>
			      <option value="Estado crítico">Estado crítico</option>
			      <option value="Pérdida">Pérdida</option>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlSelect1">Tipo de animal</label>
			    <select class="form-control" name="animal_type" id="exampleFormControlSelect1">
			      <option selected value="{{$post->animal_type}}">{{$post->animal_type}}</option>
			      <option disabled>Seleccione el tipo de animal</option>
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
			    	<option selected value="{{$post->zone->id}}">{{$post->zone->name}}</option>
			    	<option disabled>Seleccione una zona</option>
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
			    <label for="exampleFormControlTextarea1">Detalles</label>
			    <textarea name="description" placeholder="Deja detalles, datos de contacto, telefonos, emails o redes sociales" class="form-control"  rows="3">{{$post->description}}</textarea>
			  </div>
			  <button type="submit" class="btn btn-primary">Actualizar</button>
			</form>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
	</div>
</div>

@endsection