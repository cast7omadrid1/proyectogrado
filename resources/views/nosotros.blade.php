	
	@extends('master') <!--heredamos de master-->
	@section('titulo','Nosotros')
	@section('contenido')
	<!--Contenido cambiante respecto de master-->
	<h1>Nosotros</h1>
	<p>Aqui va el texto de quienes somos</p>
	<p>Mi nombre es {{$nombre}} y trabajo en {{$empresa}}</p>

	
	
	<!--Ciclo if-->
	@if ($nombre == 'Aaron')
    <p>Si soy Aaron</p>
	@else
   	<p>No soy Aaron</p>
	@endif
	<!--Ciclo for-->
	@for ($i = 0; $i < 10; $i++)
    <p>La variable es {{ $i }} <br/></p>
	@endfor
	

	@endsection