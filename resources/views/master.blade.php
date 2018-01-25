<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tienda - @yield('titulo')</title>
</head>
<body>
	<header><h1>Logo - Menu<h1></header><!-- /header -->
	
	<!--El contenido es lo que cambia-->
	@yield('contenido')

	<footer>Copyrigh - Prueba</footer>
</body>
</html>