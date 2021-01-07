<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href={{url('img/favicon.png')}}>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href={{ url('/style/style.css') }}>
    <link rel="stylesheet" href={{ url('/style/bootstrap.min.css') }}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src={{url('/js/jquery.js')}}></script>
    <script src={{url('/js/bootstrap.bundle.min.js')}}></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
    <div id="app">
        
        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>
