@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        
        <!--Obtenemos la imagen del perfil actual-->
        <img width="100px" height="100px" src="{{ asset('uploads/avatars/'.$user->avatar) }}">
        <h2>{{ $user->name }}</h2>
        <h4>Edita tu avatar</h4>
        
        <!--Formulario para cambiar avatar de usuario-->
        {{Form::open(['route' => ['user.profile.update'], 'files' => true, 'method' => 'PATCH']) }}
          <p>{{Form::file('avatar') }}</p><!--Parte del formulario para subir el archivo-->
          <p>{{Form::submit('Actualizar', ['name' => 'submit']) }}</p><!--Botón submit para actualizar la imágen-->
        {{Form::close() }}


    </div>
  </div>
</div>
@endsection