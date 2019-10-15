<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MEDUSA Core') }}</title>

    <!-- Scripts -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <!-- Additional Javascript files to include -->
@stack('js')

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Additional fonts to include -->
@stack('fonts')

<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Additional styles to include -->
    @stack('style')

    @stack('head')
</head>
<body>
<div id="app">
    @include('personality::layouts.app')
</div>

<footer class="text-sm-center">
    MEDUSA Core is copyright &copy; 2019 @if(date('Y') > 2019)- {{ date('Y') }} @endif The Royal Manticoran Navy: The
    Official Honor Harrington Fan Association and is licensed under the <a
        href="https://www.gnu.org/licenses/gpl-3.0.html">GNU General Public License v3</a>
</footer>
@stack('footer')
</body>
</html>
