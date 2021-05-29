<html>
    <head>
        <title>{{ config('app.name') }} - @yield('title')</title>
        <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/public/assets/css/custom.css">
        <script src="/public/assets//js/bootstrap.min.js" defer></script>
        @yield('head')
    </head>
    <body>
        <header>
            @component('layouts.navbar')
            @endcomponent
        </header>

        <div class="container py-4">
            @yield('content')
        </div>
        <footer class="navbar navbar-dark bg-dark text-white py-3 footer-box-shadow">
            <div class="container d-flex justify-content-center">
                <span>{{ config('app.name') }} © Илья Дудиков, 2021</span>
            </div>
        </footer>
    </body>
</html>
