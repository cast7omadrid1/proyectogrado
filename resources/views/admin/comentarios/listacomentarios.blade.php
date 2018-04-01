@extends('admin.admin')
@section('titulo','Lista comentarios')
@section('contenido')


	<div class="col-xs-12">
	 	  <h2 class="tituloseccion tituloeventos" onmouseover="javascript:this.style.color='#19F0DB';" onmouseout="javascript:this.style.color='#00D2A8';">Listado comentarios</h2>
	</div>

	<!--Buscador de articulos-->
	{{Form::open(['route' => 'articles.index','method' => 'GET', 'class' => 'navbar-form pull-right'])}}
	<div class="input-group">
		{{Form::text('title',null,['class'=>'form-control','placeholder'=>'Buscar comentarios','aria-describedby'=>'search'])}}
		<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
	</div>
	{{Form::close()}}

	<div class="panel sizetable">
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-hover" >
					<thead>
						<th>ID</th>
						<th>Comentarios</th>
						<th>Nombre articulo</th>
						<th>Nombre usuario</th>
						<th>Acción</th>
					</thead>
					<tbody>
						@foreach($comentarios as $comentario)
							<tr>
								<td>{{$comentario->id}}</td>
								<td>{{$comentario->comentarios}}</td>


								<td>
									{{$comentario->article->title}}

									
								</td>

							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		
			<!--Mostramos botones para cambiar en la lista de comentarios -->
			{!!$comentarios->render()!!}

		</div>
	</div>
	
@endsection