<!doctype html>
<html lang="de">
<head>
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="UTF-8" />

    <!-- Style Sheets -->
    <link href="{{ URL::to('css') }}/app.css" rel="stylesheet" />
    <link href="{{ URL::to('bower_components') }}/fontawesome/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Scripts -->
    <script src="{{ URL::to('bower_components') }}/jquery/dist/jquery.min.js"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('/') }}/favicon.ico" />
</head>
<body>
    @include('partials.navigation')

    <div class="container">
        <h1>@yield('title')</h1>
        @yield('content')
    </div>

    @yield('footer')
</body>
</html>