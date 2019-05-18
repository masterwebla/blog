<!DOCTYPE html>
<html>
<head>
	<title>Nosotros</title>
</head>
<body>
	<h1>NOSOTROS</h1>
	{{$nombre}}, bienvenido
	@if($edad>18)
		<div>Videos para adultos</div>
	@else
		<div>Videos para niños</div>
	@endif
</body>
</html>