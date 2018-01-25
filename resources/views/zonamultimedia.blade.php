@extends('plantillamaster')
@section('titulo','Multimedia')

@section('contenido')

<!--if para diferenciación entre un usuario normal y un usuario logueado-->
@if (Route::has('login'))
    <div class="top-right links">
          @if (Auth::check())
          @if (Auth::user()->user == 0)
                    <h1>Bienvenid@  a zona multimedia usuario</h1>
          @endif
                        
                    
         		@else

                    <h1>Bienvenid@  a zona multimedia normal</h1>  
          
          @endif
                </div>
            @endif

@endsection

