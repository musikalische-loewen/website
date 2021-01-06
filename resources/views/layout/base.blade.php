<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#233876" {{-- TODO: Adjust theme color to primary color from CSS --}} />

        <title>
            {{ config('app.name') }}
            @hasSection('title')
                - @yield('title')
            @endif
        </title>

        <link href="{{ asset('images/logos/logo_black.png') }}" rel="icon" type="image/png">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
        <link href="/css/custom.css" rel="stylesheet" {{-- TODO: Remove custom CSS --}} />
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
