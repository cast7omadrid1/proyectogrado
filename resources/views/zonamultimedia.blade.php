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
                     


                    <div class="col-md-8">
                        
                        <div class="row">
                          
                          @foreach($articles as $article)
                          <div class="col-md-6 leftimage ">
                            <div class="thumbnail ">
                              <div class="panel-body ">
                              @foreach($article->image as $image)
                                <img src="{{ asset('images/articulos/'.$image->name) }}" class="img-responsive sizeimage" alt="...">
                              @endforeach 
                              </div>     
                              <div class="caption">
                                <h3>{{$article->description}}</h3>
                                
                                <a href="">
                                  {{$article->category->name}}
                                </a>
                               
                                <!--Mostramos hace cuanto se ha creado el ultimo articulo-->
                                <i>{{$article->created_at->diffForHumans()}}</i>
                              </div>    
                            </div>
                          </div>
                          @endforeach

                      </div>

                      <!--Render para pasar imagenes-->
                      <div class="leftimage">
                        {!!$articles->render()!!}
                      </div>
                   
                    </div>



                  <!--Partial donde mostramos las categorias y los tags-->
                  <div class="col-md-4 aside rightpanel">
                       
                         @include('partials.aside')
                    
                  </div>  


                  </div>
              
      
          @endif
                        
                    
         	@else


        
                    <!--Titulo de la galería de imagenes-->
                    <div class="col-xs-12">
                      <h2 class="tituloseccion " onmouseover="javascript:this.style.color='#19F0DB';" onmouseout="javascript:this.style.color='#00D2A8';">Galeria de imágenes</h2>
                    </div>
                    
                    
                    <div class="row">
                     


                    <div class="col-md-8">
                        
                        <div class="row">
                          
                          @foreach($articles as $article)
                          <div class="col-md-6 leftimage ">
                            <div class="thumbnail ">
                              <div class="panel-body ">
                              @foreach($article->image as $image)
                                <img src="{{ asset('images/articulos/'.$image->name) }}" class="img-responsive sizeimage" alt="...">
                              @endforeach 
                              </div>     
                              <div class="caption">
                                <h3>{{$article->description}}</h3>
                                
                                <a href="">
                                  {{$article->category->name}}
                                </a>
                               
                                <!--Mostramos hace cuanto se ha creado el ultimo articulo-->
                                <i>{{$article->created_at->diffForHumans()}}</i>
                              </div>    
                            </div>
                          </div>
                          @endforeach

                      </div>

                      <!--Render para pasar imagenes-->
                      <div class="leftimage">
                        {!!$articles->render()!!}
                      </div>
                   
                    </div>



                  <!--Partial donde mostramos las categorias y los tags-->
                  <div class="col-md-4 aside rightpanel">
                       
                         @include('partials.aside')
                    
                  </div>  


                  </div>
                  
              



          
          @endif
                
          @endif

@endsection

