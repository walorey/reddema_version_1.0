	@if ($errors->any())
    <div class="alert alert-danger fade show">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
	@if (session('mensaje'))
    <div class="alert alert-success fade show">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		</button>
        <ul>
			{{session('mensaje')}}
        </ul>
    </div>
	@endif
