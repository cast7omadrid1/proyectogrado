@extends('plantillamaster')
@section('titulo','Multimedia')

@section('contenido')

<!--if para diferenciación entre un usuario normal y un usuario logueado-->
@if (Route::has('login'))
    
          @if (Auth::check())
          @if (Auth::user()->user == 0 || Auth::user()->user == 1)
                    
                    
                    <!--Titulo de la galería de imagenes-->
                    <div class="col-xs-12">
                      <h2 class="tituloseccion " onmouseover="javascript:this.style.color='#19F0DB';" onmouseout="javascript:this.style.color='#00D2A8';">Galeria de imágenes</h2>
                    </div>
                    <!--botón para añadir imagenes-->
                    <a href="{{route('articles.create')}}" onmouseover="javascript:this.style.backgroundColor='#19F0DB';" onmouseout="javascript:this.style.backgroundColor='#00D2A8';" class="btn btn-primary paddingboton">Añade una nueva imagen a nuestra galería!</a>
                    <div class="row">

                      @foreach($images as $image)
                        <div class="col-md-5 leftimage" >
                          <!--galería de imagenes-->
                          <div class="panel panel-default ">
                            <div class="panel-body ">
                              
                              <img src="{{ asset('images/articulos/'.$image->name) }}" class="img-responsive sizeimage">
                            </div>
                            <!--Mostramos nombre de imagen y nombre de categoria de cada imagen y nombre de usuario-->
                          <div class="panel-footer">{{$image->article->description}} || {{$image->article->category->name}} || {{$image->article->user->name}}</div>
                          <br>
                      
                          
                          </div>
                        </div>
                      @endforeach
                      
                    </div>
                    <div class="rox">
                      
                      
                    </div>
                    
                  
          @endif
                        
                    
         		@else
                     <!--Titulo de la galería de imagenes-->
                    <div class="col-xs-12">
                      <h2 class="tituloseccion " onmouseover="javascript:this.style.color='#19F0DB';" onmouseout="javascript:this.style.color='#00D2A8';">Galeria de imágenes</h2>
                    </div>
                              
                    <div class="row">

                      @foreach($images as $image)
                        <div class="col-md-5 leftimage">
                          <!--galería de imagenes-->
                          <div class="panel panel-default ">
                            <div class="panel-body ">
                              
                              <img src="{{ asset('images/articulos/'.$image->name) }}" class="img-responsive sizeimage">
                            </div>
                          <!--Mostramos nombre de imagen y nombre de categoria de cada imagen-->
                          <div class="panel-footer">{{$image->article->description}} || {{$image->article->category->name}}</div>
                          <br>
                      
                          
                          </div>
                        </div>
                      @endforeach
                      
                    </div>
                    <div class="rox">
          
          @endif
                
            @endif

@endsection

