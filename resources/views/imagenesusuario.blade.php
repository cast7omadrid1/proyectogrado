@extends('plantillamaster')
@section('titulo','Multimedia')

@section('contenido')

<!--Titulo de la galería de imagenes-->
    <div class="col-xs-12">
        <h2 class="tituloseccion " onmouseover="javascript:this.style.color='#19F0DB';" onmouseout="javascript:this.style.color='#00D2A8';">Tus imágenes</h2>
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
                                
                                <a href="{{route('search.category', $article->category->name)}}">
                                  {{$article->category->name}}
                                </a>
                               
                              <!--Mostramos hace cuanto se ha creado el ultimo articulo-->
                                <i>{{$article->created_at->diffForHumans()}}</i></br>
                                <a href="{{route('admin.articles.edit', $article->id)}}" onmouseover="javascript:this.style.backgroundColor='#19F0DB';" onmouseout="javascript:this.style.backgroundColor='#00D2A8';" class="btn btn-primary ">Editar</a>
                                <a href="{{route('admin.articles.destroy',$article->id)}}" class="btn btn-success" onclick="return confirm('¿Estas seguro de eliminar este articulo?')">Eliminar</a>
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



                   


                  </div>

@endsection