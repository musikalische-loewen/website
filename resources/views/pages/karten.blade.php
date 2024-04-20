@extends('layout.main')

@section('title', 'Kartenvorverkauf')
@section('image', asset('images/archive/large/alpen-background.jpg'))
@section('abstract')
    Hier können Sie Karten für unser <a class="text-white" target="_blank" href="{{ asset('images/archive/large/2024_konzert_sonne_save_the_date.jpg') }}">Pfingstkonzert</a> am 19. Mai 2024 bestellen.<br><br>
    Kinder bis zum 14. Lebensjahr haben freien Eintritt, Jugendliche vom 15. bis 17. Lebensjahr zahlen einen ermäßigten Eintrittspreis von 6€, und Erwachsene zahlen einen Eintrittspreis von 11€.<br>
    Nach dem Klick auf „Karten bestellen“ werden Sie zu unserem Zahlungsdienstleister weitergeleitet. Nach erfolgter Zahlung erhalten Sie einen Bestätigungsmail von uns. Die bestellten Karten werden für Sie an der Abendkasse hinterlegt und können gegen Vorlage der Bestätigungsmail abgeholt werden.<br><br>
    Wir freuen uns auf Ihren Besuch!
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
        <div class="row mb-5">
            <div class="col-md-8 col-lg-8">
                @if(session('success'))
                    <div class="card shadow-sm bg-success text-white mt-0 mb-4 py-0">
                        <div class="card-body">
                            <p class="mb-0">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif
                @if($errors->any())
                    <div class="card text-white bg-danger mt-0 mb-4 py-0">
                        <ul class="my-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card shadow-sm my-0 py-0">
                    <form method="post" action="{{ route('forms.ticket') }}" >
                        @csrf
                        @honeypot
                        <div class="card-body">
                            <div class="form-floating mb-3 has-validation">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Max Mustermann" value="{{ old('name') }}" required>
                                <label for="name">Name</label>
                                @include('layout.error', ['name' => 'name'])
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="max.mustermann@example.com" value="{{ old('email') }}" required>
                                <label for="email">E-Mail</label>
                                @include('layout.error', ['name' => 'email'])
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control @error('number_full') is-invalid @enderror" name="number_full" id="number_full" placeholder="2" value="{{ old('number_full', 2) }}" min="0"  required>
                                        <label for="number_full">Erwachsene (11€)</label>
                                        @include('layout.error', ['name' => 'number_full'])
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="col-md form-floating mb-3">
                                        <input type="number" class="form-control @error('number_reduced') is-invalid @enderror" name="number_reduced" id="number_reduced" placeholder="0" value="{{ old('number_reduced', 0) }}" min="0" required>
                                        <label for="number_reduced">Jugendliche (6€)</label>
                                        @include('layout.error', ['name' => 'number_reduced'])
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="col-md form-floating mb-3">
                                        <input type="number" class="form-control @error('number_reduced') is-invalid @enderror" name="number_free" id="number_free" placeholder="0" value="{{ old('number_free', 0) }}" min="0" required>
                                        <label for="number_free">Kinder (0€)</label>
                                        @include('layout.error', ['name' => 'number_free'])
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-round btn-block">Karten bestellen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
