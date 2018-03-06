@extends('plantillamaster')
@section('titulo','Eventos')

@section('contenido')


<!--Redes Sociales-->
<section>
	

<!--TOCA PENSAR SI LAS REDES SOCIALES SE QUEDAN AHI O BAJAN AL PIE-->
<div class="row">

  <div class="col-xs-12 col-sm-6 col-md-8">
 	  <h2 class="tituloseccion" onmouseover="javascript:this.style.color='#19F0DB';" onmouseout="javascript:this.style.color='#00D2A8';">Nuestros eventos ¡Visitanos!</h2>
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


					<!--redes sociales-->
					  <div class="col-xs-6 col-md-4">
					  <h2 class="tituloseccion tituloredes" onmouseover="javascript:this.style.color='#19F0DB';" onmouseout="javascript:this.style.color='#00D2A8';">Nuestras redes sociales</h2>
					  	<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Flacasablancadezaragoza%2F&tabs=timeline%2C%20events%2C%20messages&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=1389376781390269" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>

					  	<a class="twitter-timeline" data-lang="es" data-height="800" data-theme="light"  href="https://twitter.com/pmadridzaragoza?ref_src=twsrc%5Etfw">Tweets by pmadridzaragoza</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					  </div>
					</div>

					

                  </div>



	
</section>


@endsection