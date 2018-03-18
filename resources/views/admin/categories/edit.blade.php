@extends('layouts.app')
@section('titulo','Editar categorias')
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
	{{Form::open(['route'=>['categories.update',$category],'method'=>'PUT','files'=>true])}}
		
	<div class="container">
    	<div class="row">
        	<div class="col-md-8 col-md-offset-2">


				<div class="panel panel-default ">
		  			<div class="panel-heading">Editar categorias</div>
		  				<div class="panel-body ">
							<div class="form-group">
								{{Form::label('name','Nombre')}}
								{{Form::text('name',$category->name,['class'=>'form-control','placeholder'=>'Nombre categoria','required'])}}
							</div>
					
							<!--botón submnit-->
				    		<div class='form-group'>
								{{Form::submit('Editar categoria',['class'=>'btn btn-primary'])}}
							</div>
					
			
	{{Form::close()}}
		 				</div>
				</div>
			</div>
		</div>
	</div>

@endsection