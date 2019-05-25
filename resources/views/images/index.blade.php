@extends('template')
@section('titulo','Imágenes')

@section('contenido')

	<div class="text-center">
		<h2>Imágenes para {{$servicio->nombre}}</h2>
	</div>
	<hr>
	<div class="text-center">
		<form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="servicio_id" value="{{$servicio->id}}">
			<input type="file" name="archivo">
			<button class="btn btn-success">Subir</button>
			<a class="btn btn-danger" href="{{ route('servicios.index') }}">Volver</a>
		</form>
	</div>
	<hr>
	<div class="row">
		@foreach($images as $image)
			<div class="col-md-3">
				<div class="card">
					<img class="card-img-top" src="{{ asset('/imgservicios/'.$image->archivo.'') }}">
					  <div class="card-body text-center">
					  <form action="{{ route('images.destroy',$image->id) }}" method="POST">
					  	@csrf
					  	@method('delete')
					  	<button class="btn btn-danger" type="submit" onClick="return confirm('Eliminar imagen?')"><i class="fa fa-trash"></i></button>
					  </form>					
						
					  </div>
				</div>
			</div>
		@endforeach
	</div>
@endsection