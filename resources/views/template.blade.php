<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ config('app.name') }} : @yield('title')</title>
    </head>
    <body>
        @include('parts/header')
        @yield('content')
    </body>
</html>