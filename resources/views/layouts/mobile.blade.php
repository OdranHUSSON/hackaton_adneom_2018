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
<div class="page">
    <div class="navigation-interaction">
        <a class="back-button" href="/home"><i class="material-icons">keyboard_arrow_left</i></a>
        <a class="settings-button" href="#"><i class="material-icons">more_horiz</i></a>
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

</body>
</html>
