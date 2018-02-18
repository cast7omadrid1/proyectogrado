@extends('plantillamaster')
@section('titulo','Multimedia')

@section('contenido')

<!--if para diferenciación entre un usuario normal y un usuario logueado-->
@if (Route::has('login'))
    
          @if (Auth::check())
          @if (Auth::user()->user == 0 || Auth::user()->user == 1)
                    
                    
                    <!--Titulo de la galería de imagenes-->
                    <div class="col-xs-12">
                      <h2 class="tituloseccion tituloeventos" onmouseover="javascript:this.style.color='#19F0DB';" onmouseout="javascript:this.style.color='#00D2A8';">Galeria de imágenes</h2>
                    </div>
                              
                    <div class="row">

                      @foreach($images as $image)
                        <div class="col-md-5 ">
                          <!--galería de imagenes-->
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <!--<img src="/images/articulos/{{$image->name}}" class="img-responsive">-->
                              <img src="{{ asset('images/articulos/'.$image->name) }}" class="img-responsive">
                            </div>
                          <div class="panel-footer">{{$image->article->description}}</div>
                          <br>
                      
                          
                          </div>
                        </div>
                      @endforeach
                      
                    </div>
                    <div class="rox">
                      
                      
                      
                    </div>
                    
                    <!--botón para añadir imagenes-->
                    <a href="{{route('articles.create')}}" class="btn btn-primary">Añadir imagen</a>

                    

                    
          @endif
                        
                    
         		@else
                    <!--Mostraremos el panel de imagenes pero sin el botón para añadir-->
                    <h1>Bienvenid@  a zona multimedia normal</h1>  
          
          @endif
                
            @endif

@endsection

