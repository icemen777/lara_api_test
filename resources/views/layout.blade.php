<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') {{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts  -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    @yield('css')
    @yield('js')
</head>
<body>
<div id="upper_app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="margin-bottom:20px;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'LARA_API') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                @yield('header')
            </div>
        </div>
    </nav>

    <main class="main-content container">

        <div class="row">
            @hasSection ('sidebar')
                <div class="col-2 sidebar">
                    @yield('sidebar')
                </div>
                <div class="col-10">
                    @include('widgets.message')
                    @yield('content')
                </div>
            @else
                <div class="w-100">
                    @include('widgets.message')
                    @yield('content')
                </div>
            @endif
        </div>

    </main>

    <footer class="container">
        <hr/>
        <h5 class="">Footer Area</h5>
        @yield('footer')
    </footer>


</div> <!-- App id -->
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>


@yield('footer_js')
</body>
</html>
