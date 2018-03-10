@extends('layouts.app')
@section('titulo','Añadir categorias')
@section('content')




	<!--La ruta hace referencia al metodo utilizado por el formulario-->
	{{Form::open(['route'=>'categories.store','method'=>'POST','files'=>true])}}
		
	<div class="container">
    	<div class="row">
        	<div class="col-md-8 col-md-offset-2">


				<div class="panel panel-default ">
		  			<div class="panel-heading">Añadir categorias</div>
		  			<div class="panel-body ">
					<div class="form-group">
						{{Form::label('name','Nombre')}}
						{{Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre categoria','required'])}}
					</div>
					
					<!--botón submnit-->
		    		<div class='form-group'>
						{{Form::submit('Añadir categoria',['class'=>'btn btn-primary'])}}
					</div>
					
			
			{{Form::close()}}
		 			</div>

				</div>
		</div>
	</div>


@endsection