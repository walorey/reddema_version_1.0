@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Publicar algo en Reddema</h1>
	<form>
	  <div class="form-group">
	  	<label>Título</label>
	  	<input class="form-control" name="title" type="text" placeholder="Perro negro perdido, Encontre un gato...">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlSelect1">Categoria</label>
	    <select class="form-control" id="exampleFormControlSelect1" name="category">
	      <option value="adopcion">Adopción</option>
	      <option value="encuentro">Encuentro</option>
	      <option value="estado_critico">Estado crítico</option>
	      <option value="perdida">Pérdida</option>
	    </select>
	  </div>
	   <div class="form-group">
	    <label for="exampleFormControlSelect1">Tipo de animal</label>
	    <select class="form-control" id="exampleFormControlSelect1">
	      <option value="canino">Canino</option>
	      <option value="felino">Felino</option>
	      <option value="ave">Ave</option>
	      <option value="roedor">Roedor</option>
	      <option value="equino">Equino</option>
	      <option value="otro">Otro</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlSelect1">Zona</label>
	    <select class="form-control" id="exampleFormControlSelect1">
	    	<optgroup label="CABA">
		    	@foreach($zones as $zone)
		    		@if($zone->id>2 || $zone->id<51)
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
	    <input type="file" multiple class="form-control-file" id="exampleFormControlFile1">
	  </div>
	<div class="form-group">
	    <label for="exampleFormControlTextarea1">Detalles</label>
	    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
	  </div>
	  <button type="button" class="btn btn-primary">Publicar</button>
	</form>
</div>
@endsection