<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', config('app.locale')) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf_token" content="{{ csrf_token() }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('head')
        <title>@yield('title')</title>
    </head>

    <body>
        @yield('body')
        @stack('body-end')
    </body>

</html>