<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Corte y Grabado Laser González') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--Mis Estilos-->
    <link href="{{ asset('css/MisEstilos.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: rgb(189,138,62); color:white">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: rgb(122,17,17); color:white">
            
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img style="width: 6%;float: left;" src="{{asset('img/logoFinal2.png')}}" alt="LOGO">
                    
                    <h1 style="float: left; margin-top:4%; margin-left:2%; font-size:15px">Corte y Grabado Laser González</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color:white"href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color:white" href="{{ route('register') }}">{{ __('Registar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid" style="padding: 0px; margin: 0px;">
                <div class="row" style="padding: 0px; margin: 0px;">
                    <div class="col-md-12" style="padding: 0px; margin: 0px;" >
                        @yield('menunavegacion')
                    </div>
                    <div class="col-md-12" style="padding: 0px; margin: 0px;">
                        @yield('content')
                    </div>
                </div>
        </main>
    </div>
</body>
</html>
