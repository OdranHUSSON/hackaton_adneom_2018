<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="manifest" href="{{ asset('manifest.json') }}" />
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    @yield('styles')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}" defer></script>
    <script src="{{ asset('js/promise-polyfill.min.js') }}" defer></script>
</head>
<body>
<div class="page @yield('page-class')">
    @yield('background-image')
    <div class="navigation-interaction">
        <a class="back-button" href="{{ route('home') }}"><i class="material-icons">keyboard_arrow_left</i></a>
        <div class="dropdown">
            <button class="material-icons settings-button">more_horiz</button>
            <ul class="dropdown-list">
                <li><a href="{{ route('me') }}"><i class="material-icons">account_circle</i>Mon compte</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"><i class="material-icons">highlight_off</i>Déconnexion</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
    <header id="header" class="page-title">
        <h1>
            @yield('page-title')
        </h1>
        @yield('header')
    </header>
    <main id="main">
        @yield('content')
    </main>
</div>
<script src="{{ asset('js/menu.js') }}" defer></script>
</body>
</html>
