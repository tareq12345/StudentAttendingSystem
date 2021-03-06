<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'QR Code') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main>
            @include('inc.navbar')
            @auth
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="professor-list">
                                <div class="list-group">
                                    <a class="list-group-item list-group-item-action text-uppercase" href="{{ route('User.edit', \Auth::user()->id) }}">Manage Profile</a>
                                    <a class="list-group-item list-group-item-action text-uppercase" href="/doctor">Manage Student</a>
                                    <a class="list-group-item list-group-item-action text-uppercase" href="/doctor/create">Manage Courses</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            @yield('content')
                        </div>
                    <div>
                </div>
            @else
                <div class="col-md-12">
                    @yield('content')
                </div>
            @endauth
        </main>
    </div>
</body>
</html>
