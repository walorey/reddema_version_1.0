<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos-nav.css') }}" rel="stylesheet">
</head>

<body>
	<div class="container">
		<img src="{{asset('img/reddema.png')}}">
		<h1 style="text-align: center;" class="font-weight-bold">{{$post->title}}</h1>
		<hr style="margin-top: 15px; margin-bottom: 15px;">
		<span>{{$post->zone->name}}</span>
		<span>|</span>
		<span>{{$post->category}}</span>
		<div>
			@foreach($post->images as $image)
			<img src="{{asset($image->ruta)}}" style="width: 265px; height: 265px; margin-top: 35px;">
			@endforeach
		</div>

		<h3 class="text-center font-weight-normal">{{$post->description}}</h3>


		<h5 class="font-weight-lighter"> Puedes seguir la publicación en reddema.com.ar</h5>
		<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate(route('posts.show', $post->slug))) !!} ">
	</div>
</body>
</html>