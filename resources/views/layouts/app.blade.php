<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} {{ config('custom.second_name') }}</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

    <!-- Fonts -->

    @section('styles')
        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css?') . filemtime(public_path('js/app.js')) }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    @show

    <!-- PWA -->
    {{--    TODO: Generate manifest file for PWA--}}

</head>
<body>

<div id="app">
    @section('navbar')
        <nav>
            <div class="navbar navbar-light bg-light shadow-sm">
                <div class="container text-center d-block">
                    <div class="row justify-content-md-center">
                        <div class="col-12 justify-content-center">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <div class="d-inline-block">
                                    <div class="logo"></div>
                                </div>
                                <span class="align-bottom">{{ config('app.name', 'Laravel') }}</span> <sup class="badge badge-success">Beta</sup>
                            </a>
                        </div>
                        @auth
                            <div class="col-12 user-info" id="userInfo">
                                <span class="user">Пользователь:&nbsp;</span><strong>{{ Auth::user()->login }}</strong>
                                <span id="userName">({{ Auth::user()->shortname }})</span>
                                <span class="logout-icon align-middle">
                                    <a href="{{ route('logout') }}" title="Выход">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    </a>
                                </span>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    @show

    <main>
        @yield('content')
    </main>

    @section('footer')
        <footer>
            <div class="container">
                <div class="row">
                    <div class="fixed-bottom d-md-none bg-light">
                        @include('layouts.navmenu')
                    </div>
                </div>
            </div>
        </footer>
    @show
</div>

@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js?') . filemtime(public_path('js/app.js')) }}" defer></script>
@show

</body>
</html>
