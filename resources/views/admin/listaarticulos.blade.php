@extends('admin.admin')
@section('titulo','Lista articulos')
@section('contenido')


<div class="col-xs-12">
 	  <h2 class="tituloseccion tituloeventos" onmouseover="javascript:this.style.color='#19F0DB';" onmouseout="javascript:this.style.color='#00D2A8';">Listado imagenes</h2>
</div>

<!--<input type="button" value="Registra un usuario" class="btn btn-primary" onclick = "location='{{ url('/register') }}'"/>-->
<div class="panel sizetable">
  
  <div class="panel-body">

<!--Buscador de articulos-->
{{Form::open(['route' => 'articles.index','method' => 'GET', 'class' => 'navbar-form pull-right'])}}
<div class="input-group">
	{{Form::text('title',null,['class'=>'form-control','placeholder'=>'Buscar articulo','aria-describedby'=>'search'])}}
	<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
</div>
{{Form::close()}}

<table class="table table-striped " >
	<thead>
		<th>ID</th>
		<th>Titulo</th>
		<th>Description</th>
		<th>Usuario</th>
		<th>Nombre imagen</th>
		<th>Imagen</th>
	</thead>
	<!--for each para mostrar todos los articulos-->
	<tbody>

		@foreach($articles as $article)
		
			<tr>
					<td>{{$article->id}}</td>
					<td>{{$article->title}}</td>		
					<td>{{$article->description}}</td>
					
					<!--obtener nombre usuario-->
					<td>{{$article->user->name}}</td>
					
					
					<!--obtener nombre imagen-->
					<!--recorremos la colección de imagenes dentro de articulos y obtenemos el nombre-->
					@foreach($article->image as $article)
						<td>{{$article->name}}</td>
						<td><img width="30px" height="30px" src="{{ asset('images/articulos/'.$article->name) }}"></td>
					@endforeach
						 

					
					<td>
						<!--Botones para editar y eliminar articulos-->
						<a href="" class="btn btn-primary">Editar</a>
						<a href="" class="btn btn-success" onclick="return confirm('¿Estas seguro de eliminar este articulo?')">Eliminar</a>
						
					</td>
			</tr>
				
		@endforeach
	</tbody>
		
	


</table>

<!--Mostramos botones para cambiar en la lista de -->
{!!$articles->render()!!}

<hr><a href="{{route('articles.create')}}" class="btn btn-primary">Añadir imagen</a>






  </div>
</div>



@endsection