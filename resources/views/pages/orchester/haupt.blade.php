@extends('layout.main')

@section('title', 'Blasorchester')
@section('image', asset('images/archive/large/orchester-1.jpg'))

@section('main')
    <div class="container mt-5 mb-4" id="lightgallery">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm bg-primary text-white">
                    <div class="card-body">
                        <p class="card-text">
                            Dirigent: Stephan Kramer<br>
                            Probe: Jeden Freitag von 19:15 Uhr bis 21:15 Uhr
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/archive/large/orchester-2.jpg') }}" class="card-img-wrap">
                        <img src="{{ asset('images/archive/medium/orchester-2.jpg') }}" class="card-img-top" alt="Orchester">
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/archive/large/orchester-1.jpg') }}" class="card-img-wrap">
                        <img src="{{ asset('images/archive/medium/orchester-1.jpg') }}" class="card-img-top" alt="Orchester">
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/archive/large/konzert2012.jpg') }}" class="card-img-wrap">
                        <img src="{{ asset('images/archive/medium/konzert2012.jpg') }}" class="card-img-top" alt="Orchester">
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/archive/large/orchester-3.jpg') }}" class="card-img-wrap">
                        <img src="{{ asset('images/archive/medium/orchester-3.jpg') }}" class="card-img-top" alt="Orchester">
                    </a>
                </div>
            </div>
            <div class="col-md-8 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/archive/large/orchester-4.jpg') }}" class="card-img-wrap">
                        <img src="{{ asset('images/archive/medium/orchester-4.jpg') }}" class="card-img-top" alt="Orchester">
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/archive/large/header.jpg') }}" class="card-img-wrap">
                        <img src="{{ asset('images/archive/medium/header.jpg') }}" class="card-img-top" alt="Orchester">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        // Initialize lightgallery
        let lightGalleryOptions = {
            selector: '.card-img-wrap',
            download: false,
        };
        lightGallery(document.getElementById('lightgallery'), lightGalleryOptions);
    </script>
@endsection
