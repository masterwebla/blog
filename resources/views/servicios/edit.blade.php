@extends('template')
@section('titulo','Editar Servicios')

@section('contenido')
	<h1 class="text-center">Editar servicio {{$servicio->nombre}}</h1>
	@include('secciones.errores')
	<form action="{{route('servicios.update',$servicio->id)}}" method="post">
		@csrf
		@method('put')
		<div class="form-group">
			<label>Nombre</label>
			<input type="text" name="nombre" class="form-control" value="{{$servicio->nombre}}" required>
		</div>
		<div class="form-group">
			<label>Descripcion</label>
			<input type="text" name="descripcion" class="form-control" value="{{$servicio->descripcion}}" required>
		</div>
		<div class="form-group">
			<label>Precio</label>
			<input type="number" name="precio" class="form-control" value="{{$servicio->precio}}" required>
		</div>
		<div class="form-group">
			<a class="btn btn-danger" href="{{route('servicios.index')}}">Cancelar</a>
			<button class="btn btn-success">Actualizar <i class="fas fa-save"></i></button>
		</div>
	</form>
@endsection