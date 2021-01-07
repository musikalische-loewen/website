@extends('layout.main')

@section('title', 'Kidsorchester')
@section('image', asset('images/archive/large/kidsorchester.jpg'))
@section('abstract')
    Das Kidsorchester bildet nach bzw. während der Ausbildung die erste Stufe des Musikvereins.
    Nach etwa einem Jahr Einzelunterricht werden die Schüler ins Kidsorchester aufgenommen und erlenen leichte Stücke im Zusammenspiel mit anderen Kindern.
    Erste Auftritte finden im Rahmen unseres Jahreskonzertes an Pfingsten sowie beispielsweise an Altennachmittagen oder den Martinszügen statt.
@endsection

@section('main')
    <div class="container mt-5 mb-4" id="lightgallery">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm bg-primary text-white">
                    <div class="card-body">
                        <p class="card-text">
                            Dirigent: Stephan Kramer<br>
                            Probe: Jeden Freitag von 16:30 Uhr bis 17:30 Uhr
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/archive/large/kidsorchester.jpg') }}" class="card-img-wrap">
                        <img src="{{ asset('images/archive/medium/kidsorchester.jpg') }}" class="card-img-top" alt="Kidsorchester">
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
