
@extends('layouts.app')

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



{{Form::open(['route' => ['admin.listausuarios.update',$user->id], 'files' => true, 'method' => 'PUT']) }}
	

<div class="panel panel-default">
  <div class="panel-heading">Editar usuario</div>
  <div class="panel-body">
    <!--Nombre-->
    <div class='form-group'>
		{{Form::label('name','Nombre')}}
		{{Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Nombre completo','required'])}}
	</div>
	<!--mail-->
    <div class='form-group'>
		{{Form::label('email','Dirección email')}}
		{{Form::text('email',$user->email,['class'=>'form-control','placeholder'=>'example@gmail.com','required'])}}
	</div>

	
	<!--admin o no-->
    <div class='form-group'>
		{{Form::label('user','Tipo usuario')}}
		{{Form::text('user',$user->user,['class'=>'form-control','placeholder'=>'1(admin) || 0(user)','required'])}}
	</div>

	<!--botón submnit-->
    <div class='form-group'>
		{{Form::submit('Editar usuario',['class'=>'btn btn-primary'])}}
	</div>

	
{{Form::close()}}
  </div>

</div>
	

@endsection