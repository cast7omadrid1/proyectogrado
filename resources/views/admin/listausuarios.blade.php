@extends('admin.admin')
@section('titulo','Lista usuarios')

@section('contenido')


<div class="col-xs-12">
 	  <h2 class="tituloseccion tituloeventos" onmouseover="javascript:this.style.color='#19F0DB';" onmouseout="javascript:this.style.color='#00D2A8';">Lista de usuarios</h2>
</div>

<!--<input type="button" value="Registra un usuario" class="btn btn-primary" onclick = "location='{{ url('/register') }}'"/>-->
<div class="panel sizetable">
  
  <div class="panel-body">

  <!--Buscador de usuarios-->
{{Form::open(['route' => 'admin.listausuarios','method' => 'GET', 'class' => 'navbar-form pull-right'])}}
<div class="input-group">
	{{Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar usuario','aria-describedby'=>'search'])}}
	<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
</div>
{{Form::close()}}

<table class="table table-striped " >
	<thead>
		<th>ID</th>
		<th>Avatar</th>
		<th>Nombre</th>
		<th>Correo</th>
		<th>Tipo</th>
		<th>Acción</th>
	</thead>
	<!--for each para mostrar todos los usuarios-->
	<tbody>
		@foreach($users as $user)
			<tr>
					<td>{{$user->id}}</td>
					<td><img width="20px" height="20px" src="{{ asset('uploads/avatars/'.$user->avatar) }}"></td>		
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>
						@if($user->user==1)
							<span class="label label-danger">Admin</span><!--si user == 1 admin-->
						@else
							<span class="label label-info">Miembro</span><!--si user == 0 miembro-->
						@endif	

					</td>
					<td>
						<!--Botones para editar y eliminar usuarios-->
						<a href="{{route('admin.edit', $user->id)}}" class="btn btn-primary">Editar</a>
						<a href="{{route('admin.listausuarios.destroy',$user->id)}}" class="btn btn-success" onclick="return confirm('¿Estas seguro de eliminar este usuario?')">Eliminar</a>
						
					</td>
			</tr>
		@endforeach
	</tbody>

</table>
<!--Mostramos botones para cambiar en la lista de usuarios-->
{!!$users->render()!!}

  </div>
</div>


@endsection