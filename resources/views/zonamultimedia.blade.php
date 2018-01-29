@extends('plantillamaster')
@section('titulo','Multimedia')

@section('contenido')

<!--if para diferenciación entre un usuario normal y un usuario logueado-->
@if (Route::has('login'))
    
          @if (Auth::check())
          @if (Auth::user()->user == 0 || Auth::user()->user == 1)
                    
                    <!--<h1>Bienvenid@  a zona multimedia usuario</h1>-->
                    
                    <div class="col-xs-12">
                      <h2 class="tituloseccion tituloeventos" onmouseover="javascript:this.style.color='#19F0DB';" onmouseout="javascript:this.style.color='#00D2A8';">Galeria de imágenes</h2>
                    </div>
                                      
                    <!--Botones para añadir articulos/imagenes-->
                    <div class="panel sizetable">
                      <div class="panel-body">
                        Panel content
                      </div>
                      <div class="panel-footer">Panel footer</div>
                      <br>
                      <!--<a href="{{ url('/addimage') }}" class="btn btn-primary">Añadir imagen</a>-->
                      <a href="{{route('articles.create')}}" class="btn btn-primary">Añadir imagen</a>
                    </div>

                    
          @endif
                        
                    
         		@else

                    <h1>Bienvenid@  a zona multimedia normal</h1>  
          
          @endif
                
            @endif

@endsection

