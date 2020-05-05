@extends('layouts.app')

@section('content')

	<div class="container">
		<h1>Notificaciones</h1>
		<div class="row">
			<div class="col-md-6">
				<h2>No Leídas</h2>
				<ul class="list-group">
					@foreach($unreadNotifications as $unreadNotification)
						<li class="list-group-item">
							<form class="float-right" method="post" action="{{ route('notifications.read', $unreadNotification->id)}}">
								    {{csrf_field()}}
    								{{ method_field('PATCH') }}
								<button class="btn btn-secondary">{{ $unreadNotification->data['subject'] }}</button>
							</form>
						</li>
					@endforeach
				</ul>
			</div>
			<div class="col-md-6">
				<h2>Leídas</h2>
				<ul class="list-group">
					@foreach($readNotifications as $readNotification)
						<li class="list-group-item">
							<a href="{{ $readNotification->data['link']}}">
								{{ $readNotification->data['subject'] }}
							</a>
							<form class="float-right" method="post" id="formEliminar" action="{{ route('notifications.destroy', $readNotification->id)}}">
								    {{csrf_field()}}
    								{{ method_field('DELETE') }}
								<button class="btn btn-danger" form="formEliminar">x</button>
							</form>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>

@endsection