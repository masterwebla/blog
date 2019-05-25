<!DOCTYPE html>
<html>
<head>
	<title>Servicios</title>
</head>
<body>
	<h1>LISTADO DE SERVICIOS</h1>
	<table width="100%" border="1">
		<tr>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Precio</th>
		</tr>
		@foreach($servicios as $servicio)
			<tr>
				<td style="background-color: blue; color: white">{{$servicio->nombre}}</td>
				<td>{{$servicio->descripcion}}</td>
				<td>${{number_format($servicio->precio,0,".",",")}}</td>
			</tr>
		@endforeach
	</table>

</body>
</html>