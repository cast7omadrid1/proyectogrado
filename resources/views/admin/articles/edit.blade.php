@extends('layouts.app')
@section('titulo','Editar imagenes -' .$article->id)
@section('content')

@if(count($errors)>0)
		<div class='alert alert-danger' role="alert">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
			</ul>
		</div>
  	@endif



	<!--La ruta hace referencia al metodo utilizado por el formulario-->
	{{Form::open(['route'=>'articles.store','method'=>'POST','files'=>true])}}
		<div class="panel panel-default ">
  			<div class="panel-heading">Editar imagenes</div>
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
				{{Form::label('category_id','Categoría')}}
				{{Form::select('category_id',$categories,null,['class'=>'form-control','placeholder' => 'Selecciona uno de los campos','required'])}}
			</div>
			
			<div class='form-group'>
				{{Form::label('tags','Tags')}}
				{{Form::select('tags[]',$tags,null,['tags'=>'id','class'=>'form-control','multiple','required'])}}
			</div>

			

			<!--botón submnit-->
    		<div class='form-group'>
				{{Form::submit('Editar imagen',['class'=>'btn btn-primary'])}}
			</div>
			
	
	{{Form::close()}}
 			</div>

		</div>



@endsection


@section('js')
	<!--<script>
		$('.textarea-content').trumbowyg();
	</script>-->
@endsection