<!doctype html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="utf-8"/>
<<<<<<< HEAD
=======
    <meta name="csrf-token" content="{{ csrf_token() }}">

>>>>>>> 645a05b23e6795c9cfd11132cd0eda03774755d4
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- CSS/JS files -->
    @if(config('tablar','vite'))
        @vite('resources/js/app.js')
    @endif
    {{-- Custom Stylesheets (post Tablar) --}}
    @yield('tablar_css')

</head>
<body class=" border-top-wide border-primary d-flex flex-column">
<div class="page page-center">
    @yield('content')
</div>

@yield('tablar_js')
<<<<<<< HEAD

=======
@yield('scripts')
>>>>>>> 645a05b23e6795c9cfd11132cd0eda03774755d4
</html>
