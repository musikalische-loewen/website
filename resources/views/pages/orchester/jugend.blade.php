@extends('layout.main')

@section('title', 'Jugendorchester')
@section('image', asset('images/archive/large/jugendorchester.jpg'))
@section('abstract')
    Das Jugendorchester stellt die nächste Stufe nach dem Kidsorchester dar.
    Musiker mit entsprechender Qualifikation wechseln ins Jugendorchester und beginnen mit anspruchsvollerer Literatur.
    Auftritte umfassen neben unserem jährlichen Pfingstkonzert auch die Mitgestaltung der Martinszüge, Weihnachtsmärkte und der Kinderchristmette.
@endsection

@section('main')
    <div class="container mt-5 mb-4" id="lightgallery">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm bg-primary text-white">
                    <div class="card-body">
                        <p class="card-text">
                            Dirigent: Jannik Ferdinand<br>
                            Probe: Jeden Freitag von 17:30 Uhr bis 19:00 Uhr
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/archive/large/jugendorchester.jpg') }}" class="card-img-wrap">
                        <img src="{{ asset('images/archive/medium/jugendorchester.jpg') }}" class="card-img-top" alt="Jugendorchester">
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
