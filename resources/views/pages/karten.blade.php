@extends('layout.main')

@section('title', 'Kartenvorverkauf')
@section('image', asset('images/archive/large/alpen-background.jpg'))
@section('abstract')
    Der Kartenvorverkauf für unser <a target="_blank" class="text-white" href="{{ asset('docs/postkarte_pfingstkonzert_2023.pdf') }}">Pfingstkonzert</a> ist beendet.<br>
    An der Abendkasse können noch wenige Restkarten erworben werden.<br><br>
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
            </div>
        </div>
    </div>
@endsection
