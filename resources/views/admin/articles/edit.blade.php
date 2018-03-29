@extends('layouts.app')
@section('titulo','Editar articulo - ' .$article->title)
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



	
			@if (Auth::user()->user == 1 )
	
				<!--La ruta hace referencia al metodo utilizado por el formulario-->
				<!--Pasamos $article como variable-->
				<!--para editar usamos el metodo PUT-->
				{{Form::open(['route'=>['articles.update',$article],'method'=>'PUT','files'=>true])}}
					
				<div class="container">
			    	<div class="row">
			        	<div class="col-md-8 col-md-offset-2">

							<div class="panel panel-default ">
			  					<div class="panel-heading">@yield('titulo')</div>
			  					<div class="panel-body ">
			  						<!--Titulo-->
									<div class="form-group">
										{{Form::label('title','Titulo')}}
										{{Form::text('title',$article->title,['class'=>'form-control','placeholder'=>'Titulo del articulo','required'])}}
									</div>
									<!--Descripcion-->
									<div class='form-group'>
										{{Form::label('description','Descripción imagen')}}
										{{Form::textarea('description',$article->description,['class'=>'form-control textarea-content','required'])}}
									</div>
									<!--Categorias-->
									<div class='form-group'>
										{{Form::label('category_id','Categoría')}}
										{{Form::select('category_id',$categories,$article->category->id,['class'=>'form-control','placeholder' => 'Selecciona uno de los campos','required'])}}
									</div>
									<!--Tages-->
									<div class='form-group'>
										{{Form::label('tags','Tags')}}
										{{Form::select('tags[]',$tags,$mis_tags,['tags'=>'id','class'=>'form-control','multiple','required'])}}
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
		
			@else
	
				<!--La ruta hace referencia al metodo utilizado por el formulario-->
				<!--Pasamos $article como variable-->
				<!--para editar usamos el metodo PUT-->
				{{Form::open(['route'=>['admin.articles.updateifuser',$article],'method'=>'PUT','files'=>true])}}
					
				<div class="container">
			    	<div class="row">
			        	<div class="col-md-8 col-md-offset-2">

							<div class="panel panel-default ">
			  					<div class="panel-heading">@yield('titulo')</div>
			  					<div class="panel-body ">
			  						<!--Titulo-->
									<div class="form-group">
										{{Form::label('title','Titulo')}}
										{{Form::text('title',$article->title,['class'=>'form-control','placeholder'=>'Titulo del articulo','required'])}}
									</div>
									<!--Descripcion-->
									<div class='form-group'>
										{{Form::label('description','Descripción imagen')}}
										{{Form::textarea('description',$article->description,['class'=>'form-control textarea-content','required'])}}
									</div>
									<!--Categorias-->
									<div class='form-group'>
										{{Form::label('category_id','Categoría')}}
										{{Form::select('category_id',$categories,$article->category->id,['class'=>'form-control','placeholder' => 'Selecciona uno de los campos','required'])}}
									</div>
									<!--Tages-->
									<div class='form-group'>
										{{Form::label('tags','Tags')}}
										{{Form::select('tags[]',$tags,$mis_tags,['tags'=>'id','class'=>'form-control','multiple','required'])}}
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
	
			@endif
                        
                  
@endsection


@section('js')
	<!--<script>
		$('.textarea-content').trumbowyg();
	</script>-->
@endsection