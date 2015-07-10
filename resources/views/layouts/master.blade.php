<!doctype html>
<html lang="de">
    <head>
        <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        
        <!-- Script Sheets -->
        {!! HTML::script('js/jquery.js')!!}
        {!! HTML::script('bootstrap/js/bootstrap.min.js') !!}
 
        <!-- Style Sheets -->
        {!! HTML::style('bootstrap/css/bootstrap.min.css') !!}
        {!! HTML::style('css/app.css') !!}
        {!! HTML::style('css/lmenu.css') !!}

    </head>
    <body>

        @include('partials.navigation')
        <div class="container-fluids">
            @include('partials.menu')
        </div>
        @yield('footer')
    </body>
</html>