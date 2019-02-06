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
                <header class="page-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb page-header--breadcrumb">
                            <li class="breadcrumb-item">
                                <i class="fas fa-home"></i>
                            </li>
                            @yield('breadcrumb')
                        </ol>
                    </nav>
                    <div class="page-header--headline">
                        <div class="page-header--title">
                            @yield('header-title')
                            <small class="page-header--subtitle">
                                @yield('header-subtitle')
                            </small>
                        </div>
                        <div class="page-header--toolbar">
                            @yield('actions-page')
                        </div>
                    </div>
                </header>
                <div class="pb-5">
                    @yield('content')
                </div>
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
