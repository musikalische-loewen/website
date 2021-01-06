@extends('layout.main')

@section('title', 'Kontakt')
@section('image', asset('images/archive/large/rich-smith-685e1B55wr0-unsplash.jpg'))
@section('abstract')
    Möchten Sie ein Orchester für Ihre Veranstaltung buchen?
    Möchten Sie Mitglied in unserem Verein werden?
    Haben Sie eine Frage zum Musikunterricht?
    Dann schreiben Sie uns doch eine Mail oder rufen sie einfach an.
    Wir freuen uns!
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
            <div class="col-md-8 col-lg-5">
                <div class="card shadow-sm bg-primary text-white mt-0 mb-4 py-0">
                    <div class="card-body">
                        <p class="mb-0">Sie erreichen uns unter <a class="text-white" href="mailto:{{ config('mail.to.address') }}">{{ config('mail.to.address') }}</a>, unter <a class="text-white" href="tel:+4964854300">06485 4300</a> oder über das nachfolgende Kontaktformular.</p>
                    </div>
                </div>
                <div class="card shadow-sm my-0 py-0">
                    <form method="get" action="#" {{-- TODO: Make a real form with submit button etc. --}} >
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Max Mustermann">
                                <label for="name">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="max.mustermann@example.com">
                                <label for="email">E-Mail</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Hallo! Ich suche ein Orchester zur musikalischen Begleitung unserer Jubiläumsfeier... " id="message" style="height: 150px"></textarea>
                                <label for="message">Nachricht</label>
                            </div>
                            <button type="button" class="btn btn-primary btn-round btn-block">Nachricht absenden</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


