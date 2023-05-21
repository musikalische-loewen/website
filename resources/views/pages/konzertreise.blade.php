@extends('layout.main')

@section('title', 'Konzertreise nach Dirmstein')
@section('image', asset('images/archive/large/dirmstein_ansicht.jpg'))
@section('abstract')
    Mit IMPULS hat die Beauftragte der Bundesregierung für Kultur und Medien ein Förderprogramm zur schnellen Aufnahme der Proben- und Konzerttätigkeit der Amateurmusik im ländlichen Raum aufgelegt.
    Dies haben die „Löwen“ zum Anlass genommen, ihr Pfingstkonzert zwei Wochen später nochmals in Dirmstein in der Pfalz aufzuführen.
@endsection

@section('main')
    <div class="container mt-5 mb-4" id="lightgallery">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/other/dirmstein_plakat.png') }}" class="card-img-wrap">
                        <img src="{{ asset('images/other/dirmstein_plakat.png') }}" class="card-img-top" alt="Plakat Serenadenkonzert Dirmstein" style="transform: scale(1);">
                    </a>
                </div>
            </div>
            <div class="col-md-8 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/other/dirmstein_postkarte.png') }}" class="card-img-wrap">
                        <img src="{{ asset('images/other/dirmstein_postkarte.png') }}" class="card-img-top" alt="Postkarte Konzertreise Dirmstein" style="transform: scale(1);">
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-8 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/archive/large/dirmstein_ansicht.jpg') }}" class="card-img-wrap" data-sub-html="Dirmstein Ortsansicht">
                        <img src="{{ asset('images/archive/medium/dirmstein_ansicht.jpg') }}" class="card-img-top" alt="Dirmstein Ortsansicht">
                    </a>
                </div>
            </div>
            <div class="col col-md-4 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/archive/medium/dirmstein_schild.jpg') }}" class="card-img-wrap" data-sub-html="Dirmstein Ortsschild">
                        <img src="{{ asset('images/archive/medium/dirmstein_schild.jpg') }}" class="card-img-top" alt="Dirmstein Ortsschild">
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
