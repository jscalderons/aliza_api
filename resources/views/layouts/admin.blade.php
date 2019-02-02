<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- FontAwesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.7.0/js/all.js" integrity="sha384-qD/MNBVMm3hVYCbRTSOW130+CWeRIKbpot9/gR1BHkd7sIct4QKhT1hOPd+2hO8K" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('styles')
</head>
<body>
    <div id="app" class="wrapper">
        @auth
            @include('components.sidebar')
        @endauth

        <div class="content">
            @include('components.navbar')
            <main class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0 bg-transparent">
                        @yield('breadcrumb')
                    </ol>
                </nav>
                <header class="header-page">
                    <h2 class="header-page--title">
                        @yield('header-page')
                    </h2>
                    <div class="header-page--toolbar">
                        @yield('actions-page')
                    </div>
                </header>
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
