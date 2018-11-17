<html>
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tasks.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/tasks.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
<div class="page @yield('page-class')">
    <div class="navigation-interaction">
        <a class="back-button" href="/home"><i class="material-icons">keyboard_arrow_left</i></a>
        <div class="dropdown">
            <button class="material-icons settings-button">more_horiz</button>
            <ul class="dropdown-list">
                <li><a href="./users.html"><i class="material-icons">account_circle</i>My account</a></li>
                <li><a href="./logout.html"><i class="material-icons">highlight_off</i>Logout</a></li>
            </ul>
        </div>
    </div>
    <header id="header" class="page-title">
        <h1>
            @yield('page-title')
        </h1>
    </header>
</div>
<main id="main">
    @yield('content')
</main>
<script src="{{ asset('js/menu.js') }}" defer></script>
</body>
</html>
