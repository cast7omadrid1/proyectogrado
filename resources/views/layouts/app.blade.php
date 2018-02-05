<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Soccer adicts - @yield('titulo')</title>
    <link rel="shortcut icon" href="images/icons/fav_ico.ico"></link>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

     <link href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}" rel="stylesheet">

    <!-- estilos propios  -->
    <link rel="stylesheet" type="text/css" href="css/estilospropios.css" media="screen">
    <!--iconos-->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css" media="screen">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/inicio') }}">
                        <!--{{ config('app.name', 'Laravel') }}-->
                        <!--<img alt="" src="images/captura3.PNG">-->
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}"><span class="fa fa-sign-in"></span>Login</a></li>
                            <li><a href="{{ route('register') }}"><span class="fa fa-pencil-square-o"></span>Registrarse</a></li>
                        @else
                            <li class="dropdown">
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
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('plugins/trumbowyg/trumbowyg.js')}}"></script>

    @yield('js');
</body>
</html>
