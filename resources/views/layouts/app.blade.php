<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Veterina') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Veterina') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            @can('create', App\Empleado::class)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('empleado.create') }}">{{ __('Agregar empelado') }}</a>
                                </li>
                            @endcan
                            @can('viewAny', App\Empleado::class)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('empleado.index') }}">{{ __('Ver empelados') }}</a>
                                </li>
                            @endcan
                            @can('create', App\Cliente::class)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('cliente.create') }}">{{ __('Agregar cliente') }}</a>
                                </li>
                            @endcan
                            @can('viewAny', App\Cliente::class)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('cliente.index') }}">{{ __('Ver clientes') }}</a>
                                </li>
                            @endcan
                            @can('create', App\Producto::class)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('producto.create') }}">{{ __('Agregar producto') }}</a>
                                </li>
                            @endcan
                            @can('viewAny', App\Producto::class)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('producto.index') }}">{{ __('Ver productos') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('venta.create') }}">{{ __('Hacer venta') }}</a>
                                </li>
                            @endcan
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarme') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if( isset(Auth::user()->empleado))
                                       {{ Auth::user()->empleado->nombre }} <span class="caret"></span>
                                    @else
                                       {{ 'Desconocido' }} <span class="caret"></span>
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
            @yield('content')
        </main>
    </div>
</body>
</html>
