<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .highlight-on-hover:hover {
            background-color: yellow !important;

        }

        .highlight-on-hover_g:hover {
            background-color: rgb(126, 197, 230) !important;
            color: white;
        }

        .highlight-on-hover_t:hover {

            background-color: rgb(123, 116, 133, 1) !important;
            color: white;
        }

        .highlight-on-hover_t:hover::placeholder {
            color: white;
        }



        .div-container {
            max-height: 550px;
            /* Ajusta la altura máxima según tus necesidades */
            overflow-y: scroll;
            margin-left: 2%;
            background-color: rgb(179, 192, 184) !important;
        }

        h1 h2 h3 h4 h5 h6 {
            margin-left: 2% !important;
        }

        /* h2 {
            margin-left: 5% !important;
        } */
        label {
            margin-left: 1%;
        }

        .head_uno {
            background-color: rgb(65, 71, 77, 1);
            color: white !important;
            margin-left: 2%;
            margin-right: 1%;

            /* el ultimo parametro de background-color es 1 solido si es menor de 1 es traslucido */
        }



        .table-container {
            max-height: 1000px;
            /* Ajusta la altura máxima según tus necesidades */
            overflow-y: auto;
            /*overflow-x: auto;*/
            margin-left: 1%;
            margin-right: 1%;
        }

        .table-header-container {
            max-height: 40px;
            /* Ajusta la altura máxima según tus necesidades */
            overflow-y: auto;
        }

        .table-row-container {
            max-height: auto;
            /* Ajusta la altura máxima según tus necesidades */
            overflow-y: auto;
        }

        .thead-fixed {
            position: sticky !important;
            top: 0;
            background-color: hsla(210, 6%, 6%, 1);
            color: white !important;
            /* el ultimo parametro de background-color es 1 solido si es menor de 1 es traslucido */
        }

        th {
            padding: 5px;
            text-align: center;
        }

        td {
            padding: 3px;
            text-align: center;
        }


        td:first-child {
            white-space: nowrap;
        }

        #fupago,
        #recibo,
        #AñoGenerado,
        #AñoPagado {

            width: 200px;
            border: none;
            outline: none;

        }
    </style>
</head>

<body>
    <div style=" margin-left: 2%; margin-right: 1%;">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
        </nav>

    </div>

    <div id="app" style=" margin-left: 2%; margin-right: 1%;">

        <nav class="navbar navbar-expand-md  navbar-dark bg-dark  shadow-sm">
            <div class="container-fluid"><a class="navbar-brand text-white" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSuccessExample" aria-controls="navbarSuccessExample" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSuccessExample">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
                                id="navbarSuccessExampleDropdown" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu py-0" aria-labelledby="navbarSuccessExampleDropdown">
                                <div class="bg-white dark__bg-1000 py-2 rounded-3"><a class="dropdown-item"
                                        href="#">Action</a><a class="dropdown-item" href="#">Another
                                        action</a>
                                    <hr class="dropdown-divider"><a class="dropdown-item" href="#">Something else
                                        here</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1"
                                aria-disabled="true">Disabled</a></li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-phoenix-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        {{-- <main class="py-4"> --}}
    </div>
    @yield('content')
    {{-- </main> --}}

</body>

</html>
