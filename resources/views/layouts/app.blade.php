<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Vamos Que Venimos</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{--User defined scripts for the header--}}
    @yield('css')
    @routes
</head>
<body>
    <div id="app">
        {{--TopMenu--}}
        {{--Dropdown structure --}}
        <ul id="dropdown1" class="dropdown-content">
            <li class="divider"></li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"
                >
                    Salir
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        <nav>
            <div class="nav-wrapper cyan darken-2">
                <div class="container">
                    <a href="/" class="brand-logo">{{ config('app.name', 'Laravel') }}</a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                            </li>
                        @else
                            <!-- Dropdown Trigger -->
                            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"> {{ Auth::user()->first_name }} <i class="material-icons right">arrow_drop_down</i></a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        {{--Sidenav--}}
        {{--Dropdown structure --}}
        <ul id="dropdown2" class="dropdown-content">
            <li class="divider"></li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"
                >
                    Salir
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        <ul class="sidenav" id="mobile-demo">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login', ['i' => 'algo']) }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register', ['i' => 'algo']) }}">Registrarse</a>
                </li>
            @else
            <!-- Dropdown Trigger -->
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown2"> {{ Auth::user()->first_name }} <i class="material-icons right">arrow_drop_down</i></a></li>
            @endguest
        </ul>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        $(document).ready(function(){
            /* Init Materialize menu dropdown*/
            $(".dropdown-trigger").dropdown();
            $('.sidenav').sidenav();
            $('.modal').modal();
        });
    </script>

    {{--User defined scripts for the footer--}}
    @yield('js')
</body>
</html>
