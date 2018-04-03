@extends('plantillamaster')
@section('titulo','Contacto')

@section('contenido')


<div class="row">
	<div class="col-xs-4">
  		<div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Formulario de contacto</h3></div>
             	<div class="panel-body">
               		{{ Form::open(['route' => 'send', 'method' => 'post']) }}
			            <div class="form-group">
			                {!! Form::label('email', 'E-Mail') !!}
			                {!! Form::email('email', null, ['class' => 'form-control' ]) !!}
			            </div>
		                <div class="form-group">
		                   	{!! Form::label('subject', 'Asunto') !!}
		                    {!! Form::text('subject', null, ['class' => 'form-control' ]) !!}
		                </div>
		                <div class="form-group">
		                    {!! Form::label('body', 'Mensaje') !!}
		                    {!! Form::textarea('body', null, ['class' => 'form-control' ]) !!}
		                </div>
		                <div class="form-group">
		                    {!! Form::submit('Enviar', ['class' => 'btn btn-success ' ] ) !!}
		                </div>
               		{{Form::close()}}
             	</div>
        </div>
    </div>
  	<div class="col-xs-6">

		
  		<!--Mapa de google maps con la dirección-->
  		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2981.78045148501!2d-0.8709309843129076!3d41.63887678832917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5914ffee276c45%3A0xf8a553c8c8ad57b7!2sCalle+Emilio+Castelar%2C+81%2C+50013+Zaragoza!5e0!3m2!1ses!2ses!4v1522777265042" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>

  	</div>
</div>




@endsection