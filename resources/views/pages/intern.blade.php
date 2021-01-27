@extends('layout.main')

@section('title', 'Intern')
@section('image', asset('images/archive/large/fede-casanova-9HkBtMf_3TU-unsplash.jpg'))
@section('abstract')
    Hier geht's zum internen Bereich für Vereinsmitglieder.
@endsection

@section('background')
    <div class="position-fixed w-100 h-100">
        <div class="background-wrapper background-filter-light h-100">
            <div class="background-image" style="background-image: url('@yield('image')');">
            </div>
        </div>
    </div>
@endsection

@section('header')
    <header class="background-wrapper d-flex align-items-center">
        <div class="background-text container py-5">
            <h1>
                @yield('title')
            </h1>
            <div class="row align-items-start">
                <div class="col col-md-9">
                    <p class="mb-0">
                        @yield('abstract')
                    </p>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('main')
    <div class="container mt-3 mb-5">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm bg-primary text-white mt-0 mb-4 py-0">
                    <div class="card-body">
                        <p class="mb-0">Bitte beachten Sie, dass der Login zum Internen Bereich derzeit noch nicht aktiv ist.</p>
                    </div>
                </div>
                <div class="card shadow-sm my-0 py-0">
                    <form method="get" action="#" {{-- TODO: Make a real form with submit button etc. --}} >
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="max.mustermann@example.com">
                                <label for="email">E-Mail</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Passwort">
                                <label for="password">Passwort</label>
                            </div>
                            <button type="button" class="btn btn-primary btn-round btn-block me-3">Anmelden</button>
                            <a href="#">Zugangsdaten vergessen?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
