<div class="container text-end text-white">
    <a class="text-white text-decoration-none" href="{{ url('datenschutz') }}">Datenschutz</a>
    | <a class="text-white text-decoration-none" href="{{ url('impressum') }}">Impressum</a>
    <br>
    &copy;
    {{ config('app.since') }} - {{ date("Y") }}
    {{ config('app.name_full') }}
</div>
