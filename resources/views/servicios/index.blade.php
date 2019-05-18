@extends('template')
@section('titulo','Listado de Servicios')

@section('contenido')
	<h1 class="text-center">Servicios</h1>
	<a class="btn btn-success" href="{{route('servicios.create')}}">Crear nuevo <i class="fas fa-plus"></i></a>
	<br><br>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Precio</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($servicios as $servicio)
				<tr>
					<td>{{$servicio->nombre}}</td>
					<td>{{$servicio->descripcion}}</td>
					<td>${{number_format($servicio->precio,0,".",",")}}</td>
					<td>
						
						<form action="{{route('servicios.destroy',$servicio->id)}}" method="post">
							@csrf
							@method('delete')
							<a class="btn btn-info" href="{{route('servicios.edit',$servicio->id)}}">
								<i class="fas fa-edit"></i>
							</a>
							<button class="btn btn-danger" onclick="return confirm('Eliminar servicio?')">
								<i class="fas fa-trash"></i>
							</button>
							<a class="btn btn-warning" href="{{ route('images.index',$servicio->id) }}">
								<i class="fas fa-image"></i>
							</a>
						</form>						
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection