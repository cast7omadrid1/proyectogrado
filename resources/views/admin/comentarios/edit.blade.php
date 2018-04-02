@extends('layouts.app')
@section('titulo','Editar articulo - ' .$comentarios->comentarios)
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
				<!--Pasamos $comentarios como variable-->
				<!--para editar usamos el metodo PUT-->
				{{Form::open(['route'=>['admin.comentarios.update',$comentarios],'method'=>'PUT','files'=>true])}}
					
				<div class="container">
			    	<div class="row">
			        	<div class="col-md-8 col-md-offset-2">

							<div class="panel panel-default ">
			  					<div class="panel-heading">@yield('titulo')</div>
			  					<div class="panel-body ">
			  						<!--comentario-->
									<div class="form-group">
										{{Form::label('comentarios','Comentario')}}
										{{Form::text('comentarios',$comentarios->comentarios,['class'=>'form-control','placeholder'=>'Comentario','required'])}}
									</div>
									<!--articulo asociado-->
									<div class="form-group">
										{{Form::label('articulo_id','id articulo')}}
										{{Form::text('articulo_id',$comentarios->articulo_id,['class'=>'form-control','placeholder'=>'Comentario','required'])}}
									</div>
									
									<!--articulo asociado-->
									<div class="form-group">
										{{Form::label('usuario_id','id articulo')}}
										{{Form::text('usuario_id',$comentarios->usuario_id,['class'=>'form-control','placeholder'=>'Comentario','required'])}}
									</div>

									<!--botón submnit-->
						    		<div class='form-group'>
										{{Form::submit('Editar articulo',['class'=>'btn btn-primary'])}}
									</div>
						
				
				{{Form::close()}}
			 					</div>

							</div>
						</div>
					</div>
				</div>
	    
                  
@endsection


@section('js')
	<!--<script>
		$('.textarea-content').trumbowyg();
	</script>-->
@endsection