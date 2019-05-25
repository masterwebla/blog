@extends('template')
@section('titulo','Listado de Servicios')

@section('contenido')
	<h1 class="text-center">Servicios</h1>

	<?php
		//Definir las variables para recordar que se digito en las cajas del filtro
		$nombre = null; $precio1=null; $precio2=null;
		if($_GET){
			if(isset($_GET['nombre']))
				$nombre = $_GET['nombre'];
			if(isset($_GET['precio1']))
				$precio1 = $_GET['precio1'];
			if(isset($_GET['precio2']))
				$precio2 = $_GET['precio2'];
		}						
	?>

	
	<form action="{{ route('servicios.index') }}" class="form-inline">
		<a class="btn btn-success" href="{{route('servicios.create')}}">Crear nuevo <i class="fas fa-plus"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="nombre" class="form-control" placeholder="Nombre..." value="{{$nombre}}">
		<input type="number" name="precio1" class="form-control" placeholder="Precio desde..." value="{{$precio1}}">
		<input type="number" name="precio2" class="form-control" placeholder="Precio hasta..." value="{{$precio2}}">
		<button class="btn btn-info"><i class="fas fa-search"></i></button>
		<a class="btn btn-warning" href="{{ route('servicios.index') }}"><i class="fas fa-sync"></i></a>

		<a class="btn btn-primary" href="{{ route('serviciospdf') }}"><i class="fas fa-file-pdf"></i></a>

		<a class="btn btn-dark" href="{{ route('serviciosexcel') }}">Exportar <i class="fas fa-file-excel"></i></a>
		<!-- Button to Open the Modal -->
		  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
		    Importar <i class="fas fa-file-excel"></i>
		  </button>
	</form>
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

	{{$servicios->links()}}

	<!-- The Modal -->
  	@include('servicios.modalexcel')

@endsection