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
    
    <script src="{{ asset('js/app.js') }}"></script>  

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        @include('generales.menu')

        @if ( isset( $general_messege ) && $general_messege )
            <div class="alert alert-{{ $clase }}" role="alert">
                {{ $mensaje }}
            </div>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
