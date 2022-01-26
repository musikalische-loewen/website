<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#233876">

        @hasSection('description')
            <meta name="description" content="@yield('description')">
        @elseif(View::hasSection('abstract'))
            <meta name="description" content="{{ trim(View::yieldContent('abstract')) }}">
        @endif

        <title>{{ config('app.name') }}@hasSection('title') - @yield('title')@endif</title>

        <link rel="preload" as="font" href="{{ hash_url('fonts/fira-sans-v10-latin-regular.woff2') }}" type="font/woff2" crossorigin>
        <link rel="preload" as="font" href="{{ hash_url('fonts/vendor/@fortawesome/fontawesome-free/webfa-brands-400.woff2') }}" type="font/woff2" crossorigin>
        <link rel="preload" as="font" href="{{ hash_url('fonts/vendor/@fortawesome/fontawesome-free/webfa-solid-900.woff2') }}" type="font/woff2" crossorigin>

        <link href="{{ asset('images/logos/logo_black.png') }}" rel="icon" type="image/png">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>

    <body class="d-flex flex-column">

        @yield('background')

        <nav class="navbar navbar-dark navbar-expand-lg bg-primary @if(View::hasSection('background') or View::hasSection('navbar-fixed')) bg-transparent  @else shadow @endif @hasSection('navbar-fixed')) fixed-top @else sticky-top @endif">
            @include('layout.nav')
        </nav>

        @yield('header')

        <main class="flex-shrink-0">
            @yield('main')
        </main>

        <footer class="mt-auto @hasSection('background') bg-transparent @else bg-dark @endif">
            @include('layout.footer')
        </footer>

        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>

        @yield('javascript')

    </body>

</html>
