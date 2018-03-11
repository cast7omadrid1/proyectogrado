
@extends('layouts.app')
@section('titulo','Editar usuario - ' .$user->name)
@section('content')




<!--Formulario para la edición -->
{{Form::open(['route' => ['admin.listausuarios.update',$user->id], 'files' => true, 'method' => 'PUT']) }}
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default ">
  			<div class="panel-heading sizetable">@yield('titulo')</div>
  				<div class="panel-body ">
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
	</div>
</div>
</div>

@endsection