<!DOCTYPE html>
<html>
<head>
	<title></title>

<body>
	<div class="container">
		<span>{{$post->zone->name}}</span>
		<span>|</span>
		<span>{{$post->category}}</span>
		<h1 style="text-align: center;">{{$post->title}}</h1>

			<hr style="margin-top: 15px; margin-bottom: 15px;">

			@foreach($post->images as $image)
			<img src="{{asset($image->ruta)}}" style="width: 310px; height: 310px; margin-top: 35px;">
			@endforeach


		<h3 class="text-center">{{$post->description}}</h3>


		<h4> Puedes seguir la publicación en reddema.com.ar</h4>
		<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate(route('posts.show', $post->id))) !!} ">
	</div>
</body>
</html>