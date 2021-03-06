<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @yield('css')

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700;900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://use.typekit.net/nnx6nqd.css">
        <x-google-analytics/>
        <title>Cretech - @yield('title')</title>
    </head>

    <body>
        <x-navbar/>

        @yield('content')
        
        <x-footer/>
        <x-cookies-popup/>
    </body>

    @yield('js')
</html>