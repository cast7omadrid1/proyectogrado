
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<head>

  <!-- Basic -->
  <title>Soccer adicts - @yield('titulo')</title>
  
  

  <link rel="shortcut icon" href="{{ URL::asset('images/icons/fav_ico.ico') }}"></link>


  <!-- Define Charset -->
  <meta charset="utf-8">

  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Page Description and Author -->
  <meta name="description" content="Margo - Responsive HTML5 Template">
  <meta name="author" content="GrayGrids">



  <link  rel = "stylesheet"  href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

  <!-- Revolution Slider-->
   <link rel="stylesheet" href="{{ URL::asset('css-bootstrap/settings.css') }}" type="text/css" media="screen">


  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css-bootstrap/slicknav.css') }}" media="screen">

  <!--Fuentes-->
 <link rel="stylesheet" href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}" type="text/css" media="screen">

 <!-- Margo CSS Styles  -->
 <link rel="stylesheet" type="text/css" href="{{ URL::asset('css-bootstrap/style.css') }}" media="screen">


<!-- Responsive CSS Styles  -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css-bootstrap/responsive.css') }}" media="screen">


<!-- Css3 Transitions Styles  -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css-bootstrap/animate.css') }}" media="screen">

<!-- Color Defult -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css-bootstrap/colors/blue.css') }}" media="screen" />

<!-- estilos propios  -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilospropios.css') }}" media="screen">


<link rel="stylesheet" href="{{ URL::asset('slimbox/css/slimbox2.css') }}" type="text/css" media="screen" />




</head>

<body>


  <!-- Full Body Container-->
  <div id="container">

    <!-- Start Header Section-->
    <header class="clearfix">
      <!-- Start  Logo & Naviagtion-->
      <div class="navbar navbar-default navbar-top" role="navigation" data-spy="affix" data-offset-top="50">
        <div class="container">
          <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles-->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
            <!-- End Toggle Nav Link For Mobiles-->
            <a class="navbar-brand" href="{{ url('/inicio') }}">
              
              <img alt="" src="{{ URL::asset('images/captura3.PNG') }}">
              
            </a>
          </div>
          <div class="navbar-collapse collapse"></div>
            <!-- Stat Search-->
            <div class="search-side">
              <a class="show-search"><i class="fa fa-search"></i></a>
              <div class="search-form">
                <form autocomplete="off" role="search" method="get" class="searchform" action="#">
                  <input type="text" value="" name="s" id="s" placeholder="Buscar...">
                </form>
              </div>
            </div>
            <!-- End Search-->
           

            <!-- Menu de navegación web -->
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="{{ url('/inicio') }}">Inicio</a>
              </li>
              <li>
                <a href="{{ url('/eventospena') }}">Eventos Peña</a>
              </li>
              <li>
                <a href="{{ url('/noticias') }}">Noticias</a>
              </li>
              <li>
                <a href="{{ url('/organigrama') }}">Organigrama</a>
              </li>
              <li>
                <a href="{{ url('/zonamultimedia') }}">Zona multimedia</a>
              </li>
              <li><a href="{{ url('/contacto') }}">Contacto</a>
              </li>
              <li>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar-->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar-->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links--> 
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}"><span class="fa fa-sign-in"></span>Login</a></li>
                            <li><a href="{{ route('register') }}"><span class="fa fa-pencil-square-o"></span>Registrarse</a></li>
                        @else
                            <li class="navbar-static-top">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   
                                   <!--Imagen de avatar, si no esta cambiado, muestra imagen por defecto-->
                                   <img width="20px" height="20px" src="{{ asset('uploads/avatars/'.Auth::user()->avatar) }}">
                                    {{ Auth::user()->name }} <span class="caret"></span>

                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>

                                        <a href="{{route('home') }}">
                                            Home
                                        </a>

                                         <a href="{{url('inicioadmin')}}">
                                            Panel admin
                                          </a>

                                        <!--Nos envia al perfil del usuario-->
                                        <a href="{{route('user.profile') }}">
                                            Perfil usuario
                                        </a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
              </li>
             </ul>
          </div>
        </div>

        <!-- Menu para moviles-->
        <ul class="wpb-mobile-menu">
          <li>
                <a href="{{ url('/inicio') }}">Inicio</a>
              </li>
              <li>
                <a href="{{ url('/eventospena') }}">Eventos Peña</a>
              </li>
              <li>
                <a href="{{ url('/noticias') }}">Noticias</a>
              </li>
              <li>
                <a href="{{ url('/organigrama') }}">Organigrama</a>
              </li>
              <li>
                <a href="{{ url('/zonamultimedia') }}">Zona multimedia</a>
              </li>
              <li><a href="{{ url('/contacto') }}">Contacto</a>
              </li>
        </ul>
        <!-- Fin menu para moviles-->

      </div>
      <!-- End Header Logo & Naviagtion-->

    </header>
    <!-- End Header Section-->
  </div>



  <div>

  <!--Para mostrar los mensajes flash-->   
  @include('flash::message')
  
    <!--El contenido es lo que cambia-->
  @yield('contenido')
  
  

  </div>

    <!-- Start Footer Section -->
    <footer>
      <div class="container">
        <div class="row footer-widgets">


          <!-- Start Subscribe & Social Links Widget -->
          <div class="col-md-4 col-xs-12">
            <div class="footer-widget mail-subscribe-widget">
              <h4>Contacta con nosotros<span class="head-line"></span></h4>
              <p>Si tienes alguna pregunta envianos un mail</p>
              <form class="subscribe">
                <input type="text" placeholder="mail@ejemplo.com">
                <input type="submit" class="btn-system" value="Enviar">
              </form>
            </div>
            <div class="footer-widget social-widget">
              <h4>Siguenos<span class="head-line"></span></h4>
              <ul class="social-icons">
                <li>
                  <!--<a class="facebook" href="#"><i class="fa fa-facebook"></i></a>-->
                  <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Flacasablancadezaragoza%2F&width=60px&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=1389376781390269" width="180px" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                </li>
                <li>
                  <!--<a class="twitter" href="#"><i class="fa fa-twitter"></i></a>-->
                  <!--Botón propio de twitter para twitter a través de la página web-->
                  <a href="https://twitter.com/intent/tweet?screen_name=pmadridzaragoza&ref_src=twsrc%5Etfw" class="twitter-mention-button" data-related="" data-lang="es" data-show-count="false">Tweet de @pmadridzaragoza</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </li>
                <li>
                  <!--<a class="instgram" href="#"><i class="fa fa-instagram"></i></a>-->
                </li>
              </ul>
            </div>
          </div>
          <!-- .col-md-3 -->
          <!-- End Subscribe & Social Links Widget -->


          <!-- Start Twitter Widget -->
          <div class="col-md-4 col-xs-12">
            <div class="footer-widget twitter-widget">
              <h4>Twitter Feed<span class="head-line"></span></h4>
              <ul>
                <li>
                  <p><a href="#">@GrayGrids </a> Lorem ipsum dolor et, consectetur adipiscing eli.</p>
                  <span>28 February 2016</span>
                </li>
                <li>
                  <p><a href="#">@GrayGrids </a> Lorem ipsum dolor et, consectetur adipiscing eli.An Fusce eleifend aliquet nis application.</p>
                  <span>26 February 2016</span>
                </li>
                <li>
                  <p><a href="#">@GrayGrids </a> Lorem ipsum dolor et, consectetur adipiscing eli.</p>
                  <span>28 February 2016</span>
                </li>
              </ul>
            </div>
          </div>
          <!-- .col-md-3 -->
          <!-- End Twitter Widget -->


          <!--<!-- Start Flickr Widget 
          <div class="col-md-3 col-xs-12">
            <div class="footer-widget flickr-widget">
              <h4>Flicker Feed<span class="head-line"></span></h4>
              <ul class="flickr-list">
                <li>
                  <a href="images/flickr-01.jpg" class="lightbox">
                    <img alt="" src="images/flickr-01.jpg">
                  </a>
                </li>
                <li>
                  <a href="images/flickr-02.jpg" class="lightbox">
                    <img alt="" src="images/flickr-02.jpg">
                  </a>
                </li>
                <li>
                  <a href="images/flickr-03.jpg" class="lightbox">
                    <img alt="" src="images/flickr-03.jpg">
                  </a>
                </li>
                <li>
                  <a href="images/flickr-04.jpg" class="lightbox">
                    <img alt="" src="images/flickr-04.jpg">
                  </a>
                </li>
                <li>
                  <a href="images/flickr-05.jpg" class="lightbox">
                    <img alt="" src="images/flickr-05.jpg">
                  </a>
                </li>
                <li>
                  <a href="images/flickr-06.jpg" class="lightbox">
                    <img alt="" src="images/flickr-06.jpg">
                  </a>
                </li>
                <li>
                  <a href="images/flickr-07.jpg" class="lightbox">
                    <img alt="" src="images/flickr-07.jpg">
                  </a>
                </li>
                <li>
                  <a href="images/flickr-08.jpg" class="lightbox">
                    <img alt="" src="images/flickr-08.jpg">
                  </a>
                </li>
                <li>
                  <a href="images/flickr-09.jpg" class="lightbox">
                    <img alt="" src="images/flickr-09.jpg">
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- .col-md-3 -->
          <!-- End Flickr Widget -->


          <!-- Start Contact Widget -->
          <div class="col-md-4 col-xs-12">
            <div class="footer-widget contact-widget">
              <h4><img src="images/captura3.PNG" class="img-responsive" alt="Footer Logo" /></h4>
              <p>Si te interesa conocer todo acerca de tu equipo favorito ¡visitanos!</p>
              <ul>
                <li><span>Número de teléfono:</span> +34 976 618 450</li>
                <li><span>Email:</span> socceraddicts@gmail.com</li>
                <li><a class="popup-gmaps" href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom"><span>Dirección: </span>abrir google maps</a> </li>
                <li><span>Website:</span> www.socceradicts.com</li>
              </ul>
            </div>
          </div>
          <!-- .col-md-3 -->
          <!-- End Contact Widget -->


        </div>
        <!-- .row -->

        <!-- Start Copyright -->
        <div class="copyright-section">
          <div class="row">
            <div class="col-md-6">
              <p>Copyright © 2016 Margo - Designed &amp; Developed by <a href="http://graygrids.com">GrayGrids</a></p>
            </div>
            <!-- .col-md-6 -->
            <div class="col-md-6">
              <ul class="footer-nav">
                <li><a href="#">Sitemap</a>
                </li>
                <li><a href="#">Privacy Policy</a>
                </li>
                <li><a href="#">Contact</a>
                </li>
              </ul>
            </div>
            <!-- .col-md-6 -->
          </div>
          <!-- .row -->
        </div>
        <!-- End Copyright -->

      </div>
    </footer>
    <!-- End Footer Section -->


  </div>
  <!-- End Full Body Container -->

  <!-- Go To Top Link -->
  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!--<div id="loader">
    <div class="spinner">
      <div class="dot1"></div>
      <div class="dot2"></div>
    </div>
  </div>-->


  <!--<script type="text/javascript" src="js/script.js"></script>-->


<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
  
  <script type="text/javascript" src="js-bootstrap/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="js-bootstrap/jquery.fitvids.js"></script>
  <script type="text/javascript" src="js-bootstrap/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="js-bootstrap/jquery.appear.js"></script>
  <script type="text/javascript" src="js-bootstrap/jquery.textillate.js"></script>
  <script type="text/javascript" src="js-bootstrap/jquery.lettering.js"></script>
  <script type="text/javascript" src="js-bootstrap/jquery.easypiechart.min.js"></script>
  <script type="text/javascript" src="js-bootstrap/jquery.slicknav.js"></script> 
  <!--MisJquery-->
  <script type="text/javascript" src="js-bootstrap/MisjQueryJS.js"></script>

  <script type="text/javascript" src="js-bootstrap/jquery.migrate.js"></script>
  <script type="text/javascript" src="js-bootstrap/modernizrr.js"></script>
  <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js-bootstrap/owl.carousel.min.js"></script>
  <script type="text/javascript" src="js-bootstrap/nivo-lightbox.min.js"></script>
  <script type="text/javascript" src="js-bootstrap/count-to.js"></script>
  <script type="text/javascript" src="js-bootstrap/smooth-scroll.js"></script>
  <script type="text/javascript" src="js-bootstrap/skrollr.js"></script>
  <script type="text/javascript" src="js-bootstrap/jquery.parallax.js"></script>
  <script type="text/javascript" src="js-bootstrap/mediaelement-and-player.js"></script>


  
  <script type="text/javascript" src="bootstrap-design/js/bootstrap.js"></script>
  <script type="text/javascript" src="bootstrap-design/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="bootstrap-design/js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="bootstrap-design/js/mdb.js"></script>
  <script type="text/javascript" src="bootstrap-design/js/mdb.min.js"></script>
  <script type="text/javascript" src="bootstrap-design/js/popper.min.js"></script>

  <!--Script para Slimbox2-->
  <script type="text/javascript" src="slimbox/js/slimbox2.js"></script>


  
  

 <!--Script para la eliminacion de los mensajes de alerta en 3 segundos-->
  <script>
      $('div.alert').delay(3000).fadeOut(350);
  </script>

</body>

</html>

