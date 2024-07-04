<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My tasks</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Scripts -->


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Quicksand', sans-serif;
            /* color: white */
        }

        body {
            align-items: center;
            min-height: 100vh;
            background: #000;
        }

        .nav-background {
            background-color: #aaa;
        }

        .nav-background .container .logo {
            font-size: 35px;
            color: greenyellow;
            font-weight: bold;
        }

        .nav-background .container .links {
            font-size: 15px;
            font-weight: bold;
        }

        .card {
            background-color: rgb(79, 79, 79);
            color: white;
            border: 3px solid rgb(45, 45, 45);
            border-radius: 15px;
        }
        .color-atribut{
            color: white;
        }
        /* .card .card-body table thead {
            background-color: rgb(79, 79, 79);

        } */
    </style>
</head>

<body>



    <div id="app">


        <nav class="navbar navbar-expand-md navbar-light shadow-sm nav-background">
            <div class="container">
                <a class="navbar-brand logo" href="{{ url('/') }}">
                    My tasks
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse links" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link ">
                                page d'accueil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('task.create') }}" class="nav-link ">
                                Ajouter un task
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('profile') }}" class="nav-link">
                                Mon profile
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->email }}
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
