<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @yield('css')
        @yield('js')
        <title>@yield('title')</title>
    </head>
    <body @yield('onload')>
    @yield('content')
    </body>
</html>