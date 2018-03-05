@extends('plantillamaster')
@section('titulo','Contacto')

@section('contenido')



	<!--La ruta hace referencia al metodo utilizado por el formulario
	{{Form::open(array
			(	
				'action' => 'ContactoController@contacto',
				'method' => 'POST' ,
				'role'   => 'form' ,
			))
	}}
	
<div class="container">
    	<div class="row">
        	<div class="col-md-10">


		<div class="panel panel-default ">
  			<div class="panel-heading">Contacto</div>
  			<div class="panel-body ">
			<div class="form-group">
				{{Form::label('name','Nombre')}}
				{{Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre','required'])}}
			</div>
			<div class="form-group">
				{{Form::label('email','Email')}}
				{{Form::text('email',null,['class'=>'form-control','placeholder'=>'Email','required'])}}
			</div>
			<div class="form-group">
				{{Form::label('subject','Asunto')}}
				{{Form::text('subject',null,['class'=>'form-control','placeholder'=>'Asunto','required'])}}
			</div>
			<div class='form-group'>
				{{Form::label('msg','Mensaje: ')}}
				{{Form::textarea('msg',null,['class'=>'form-control textarea-content','required'])}}
			</div>
			<div class='form-group'>
				{{Form::input('hidden','contacto')}}
				
			</div>

			<!--botón submnit
    		<div class='form-group'>
				{{Form::submit('Enviar',['class'=>'btn btn-primary'])}}
			</div>
			
	
	{{Form::close()}}
 			</div>

		</div>
	</div>
		</div>
	</div>-->

<div class="container">
   <div class="row">
       <div class="col col-md-8 col-md-offset-2"   >
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
   </div>
</div>







@endsection