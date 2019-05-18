@extends('template')
@section('titulo','Crear Servicios')

@section('contenido')
	<h1 class="text-center">Crear servicio</h1>
	@include('secciones.errores')
	<form action="{{route('servicios.store')}}" method="post">
		@csrf
		<div class="form-group">
			<label>Nombre</label>
			<input type="text" name="nombre" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Descripcion</label>
			<input type="text" name="descripcion" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Precio</label>
			<input type="number" name="precio" class="form-control" required>
		</div>
		<div class="form-group">
			<a class="btn btn-danger" href="{{route('servicios.index')}}">Cancelar</a>
			<button class="btn btn-success">Guardar <i class="fas fa-save"></i></button>
		</div>
	</form>
@endsection