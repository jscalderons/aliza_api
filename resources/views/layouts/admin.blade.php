<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- FontAwesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.6.3/js/solid.js" integrity="sha384-F4BRNf3onawQt7LDHDJm/hwm3wBtbLIfGk1VSB/3nn3E+7Rox1YpYcKJMsmHBJIl" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.6.3/js/fontawesome.js" integrity="sha384-treYPdjUrP4rW5q82SnECO7TPVAz4bpas16yuE9F5o7CeBn2YYw1yr5oC8s8Mf8t" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="wrapper">
        @auth
            @include('components.sidebar')
        @endauth

        <div class="content">
            @include('components.navbar')

            <main class="container-fluid mt-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(function () {

            $('#sidebarCollapse').on('click', function () {
                $(this).toggleClass('active');
                $('#sidebar').toggleClass('active');
            });

        });
    </script>
    @yield('scripts')
</body>
</html>
