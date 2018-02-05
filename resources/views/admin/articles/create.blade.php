@extends('layouts.app')
@section('titulo','Añadir imagenes')
@section('content')

	{{Form::open(['route'=>'articles.store','method'=>'POST','files'=>true])}}
		<div class="panel panel-default ">
  			<div class="panel-heading">Añadir imagenes</div>
  			<div class="panel-body ">
			<div class="form-group">
				{{Form::label('title','Titulo')}}
				{{Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo del articulo','required'])}}
			</div>
			<div class='form-group'>
				{{Form::label('description','Descripción imagen')}}
				{{Form::textarea('description',null,['class'=>'form-control textarea-content','required'])}}
			</div>
			
			<div class='form-group'>
				{{Form::label('image','Imagen')}}
				{{Form::file('image')}}
			</div>

			<!--botón submnit-->
    		<div class='form-group'>
				{{Form::submit('Añadir imagen',['class'=>'btn btn-primary'])}}
			</div>
			
	
	{{Form::close()}}
 			</div>

		</div>



@endsection


@section('js')
	<script>
		$('.textarea-content').trumbowyg();
	</script>
@endsection