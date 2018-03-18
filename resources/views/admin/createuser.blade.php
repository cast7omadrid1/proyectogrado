@extends('layouts.app')
@section('titulo','Añadir usuario')
@section('content')

<!--La ruta hace referencia al metodo utilizado por el formulario-->
    {{Form::open(['route'=>'listausuarios.store','method'=>'POST'])}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default ">
                    <div class="panel-heading">Añadir usuario</div>
                    <div class="panel-body ">
                    <div class="form-group">
                        {{Form::label('name','Nombre')}}
                        {{Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre del usuario','required'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::label('email','Email')}}
                        {{Form::text('email',null,['class'=>'form-control textarea-content','placeholder'=>'Email del usuario','required'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::label('password','Contraseña')}}
                        {{Form::text('password',null,['class'=>'form-control textarea-content','placeholder'=>'***********','required'])}}
                    </div>

                    <div class='form-group'>
                        {{Form::label('user','Tipo usuario')}}
                        {{Form::select('user',['0','1'],['tags'=>'id','class'=>'form-control','multiple','required'])}}
                    </div>

                    <div class='form-group'>
                        {{Form::label('socio','Número socio')}}
                        {{Form::text('socio',null,['class'=>'form-control textarea-content','placeholder'=>'Numero socio','required'])}}
                    </div>
                    
                    <!--botón submnit-->
                    <div class='form-group'>
                        {{Form::submit('Añadir usuario',['class'=>'btn btn-primary'])}}
                    </div>
                    
    {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
