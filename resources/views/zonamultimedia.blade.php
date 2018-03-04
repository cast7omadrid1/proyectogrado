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
                          
                          @foreach($images as $image)
                          <div class="col-md-6 leftimage ">
                            <div class="thumbnail ">
                              <div class="panel-body ">
                                <img src="{{ asset('images/articulos/'.$image->name) }}" class="img-responsive sizeimage">  
                              </div>     
                              <div class="caption">
                                <h3>{{$image->article->description}}</h3>
                                <p>{{$image->article->category->name}}</p>
                                <p>{{$image->article->user->name}}</p>
                              </div>    
                            </div>
                          </div>
                          @endforeach

                      </div>
                    <!--Render para pasar imagenes-->
                      <div class="leftimage">
                        {!!$images->render()!!}
                      </div>


                      
                    
                    </div>


                  <div class="col-md-4 aside rightpanel">
                        <!--<div class="panel panel-primary">
                          <div class="panel-heading leftname">
                            <h3 class="panel-title ">Categorias</h3>
                          </div>
                          <div class="panel-body">
                            <ul class="list-group">
                              <li class="list-group-item">
                                <span class=" badge badge-error">15</span>
                                Evento administrador
                              </li>
                              <li class="list-group-item">
                                <span class="badge badge-error">20</span>
                                Evento usuario
                              </li>
                            </ul>
                          </div>
                          

                        </div>

                        <div class="panel panel-primary">
                          <div class="panel-heading leftname">
                            <h3 class="panel-title">Tags</h3>
                          </div>
                          <div class="panel-body">
                            <span class="label label-warning label-color">fiesta</span>
                            <span class="label label-warning label-color">partido santander</span>
                            <span class="label label-warning label-color">partido premier</span>
                          </div>
                        </div>-->

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
                          
                          @foreach($images as $image)
                          <div class="col-md-6 leftimage ">
                            <div class="thumbnail ">
                              <div class="panel-body ">
                                <img src="{{ asset('images/articulos/'.$image->name) }}" class="img-responsive sizeimage">  
                              </div>     
                              <div class="caption">
                                <h3>{{$image->article->description}}</h3>
                                
                                
                                
                                <a href="{{route('search.category', $image->article->category->name)}}">
                                  {{$image->article->category->name}}
                                </a>
                               

                                <p>{{$image->article->user->name}}</p>
                              </div>    
                            </div>
                          </div>
                          @endforeach

                      </div>
                   


                      
                    
                    </div>


                  <div class="col-md-4 aside rightpanel">
                        <!--<div class="panel panel-primary">
                          <div class="panel-heading leftname">
                            <h3 class="panel-title ">Categorias</h3>
                          </div>
                          <div class="panel-body">
                            <ul class="list-group">
                              <li class="list-group-item">
                                <span class=" badge badge-error">15</span>
                                Evento administrador
                              </li>
                              <li class="list-group-item">
                                <span class="badge badge-error">20</span>
                                Evento usuario
                              </li>
                            </ul>
                          </div>
                          

                        </div>

                        <div class="panel panel-primary">
                          <div class="panel-heading leftname">
                            <h3 class="panel-title">Tags</h3>
                          </div>
                          <div class="panel-body">
                            <span class="label label-warning label-color">fiesta</span>
                            <span class="label label-warning label-color">partido santander</span>
                            <span class="label label-warning label-color">partido premier</span>
                          </div>
                        </div>-->
                         @include('partials.aside')
                    
                  </div>  


                  </div>
                  
              



          
          @endif
                
          @endif

@endsection

