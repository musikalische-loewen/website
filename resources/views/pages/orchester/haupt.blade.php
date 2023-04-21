@extends('layout.main')

@section('title', 'Blasorchester')
@section('image', asset('images/archive/large/2017_konzert_stratosphaere.jpg'))

@section('main')
    <div class="container mt-5 mb-4" id="lightgallery">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm bg-primary text-white">
                    <div class="card-body">
                        <p class="card-text">
                            Dirigent: Lukas Oberbauer<br>
                            Probe: Jeden Freitag von 19:15 Uhr bis 21:15 Uhr
                        </p>
                    </div>
                </div>
                <div class="card shadow-sm mt-3">
                    <a href="{{ asset('images/archive/medium/lukas.jpg') }}" class="card-img-wrap" data-sub-html="Dirigent Lukas Oberbauer">
                        <img src="{{ asset('images/archive/medium/lukas.jpg') }}" class="card-img-top" alt="Dirigent Lukas Oberbauer">
                    </a>
                </div>
            </div>
            <div class="col-md-8 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/archive/large/2022_konzert_zu_neuen_horizonten_a.jpg') }}" class="card-img-wrap" data-sub-html="Pfingstkonzert 2022: Zu neuen Horizonten">
                        <img src="{{ asset('images/archive/medium/2022_konzert_zu_neuen_horizonten_a.jpg') }}" class="card-img-top" alt="Pfingstkonzert 2022: Zu neuen Horizonten">
                    </a>
                </div>
            </div>
        </div>
        <div id="mansonry" class="row">
            <div class="col col-md-4 mb-4">
                <div class="card shadow-sm">
                    <a href="https://www.youtube.com/watch?v=WoSVMh1_FDs" class="card-img-wrap" data-sub-html="Karneval 2021: Der Schmucke Prinz-Corona Edition">
                        <img src="{{ asset('images/archive/medium/youtube-karneval.jpg') }}" class="card-img-top" alt="Karneval 2021: Der Schmucke Prinz-Corona Edition">
                    </a>
                </div>
            </div>
            <div class="col col-md-8 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/archive/large/2017_konzert_stratosphaere.jpg') }}" class="card-img-wrap" data-sub-html="Pfingstkonzert 2017: Stratosphäre">
                        <img src="{{ asset('images/archive/medium/2017_konzert_stratosphaere.jpg') }}" class="card-img-top" alt="Pfingstkonzert 2017: Stratosphäre">
                    </a>
                </div>
            </div>
            <div class="col col-md-4 mb-4">
                <div class="card shadow-sm">
                    <a href="https://www.youtube.com/watch?v=91un-HPcSxU" class="card-img-wrap" data-sub-html="Klopapierchallenge 2020">
                        <img src="{{ asset('images/archive/medium/youtube-klopapier.jpg') }}" class="card-img-top" alt="Klopapierchallenge 2020">
                    </a>
                </div>
            </div>
            <div class="col col-md-4 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/archive/large/2019_weihnachtsmarkt.jpg') }}" class="card-img-wrap" data-sub-html="Weihnachtsmarkt 2019 in Limburg an der Lahn">
                        <img src="{{ asset('images/archive/medium/2019_weihnachtsmarkt.jpg') }}" class="card-img-top" alt="Weihnachtsmarkt 2019 in Limburg an der Lahn">
                    </a>
                </div>
            </div>
            <div class="col col-md-4 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/archive/large/2020_karneval_c.jpg') }}" class="card-img-wrap" data-sub-html="Veilchendienstagszug 2020 in Heimbach-Weis">
                        <img src="{{ asset('images/archive/medium/2020_karneval_c.jpg') }}" class="card-img-top" alt="Veilchendienstagszug 2020 in Heimbach-Weis">
                    </a>
                </div>
            </div>
            <div class="col col-md-4 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/archive/large/header.jpg') }}" class="card-img-wrap" data-sub-html="Pfingstkonzert 2014: Very british!">
                        <img src="{{ asset('images/archive/medium/header.jpg') }}" class="card-img-top" alt="Pfingstkonzert 2014: Very british!">
                    </a>
                </div>
            </div>
            <div class="col col-md-4 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ asset('images/archive/large/2012_konzert_e.jpg') }}" class="card-img-wrap" data-sub-html="Pfingstkonzert 2012: Concierto de Calella">
                        <img src="{{ asset('images/archive/medium/2012_konzert_e.jpg') }}" class="card-img-top" alt="Pfingstkonzert 2012: Concierto de Calella">
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
        // Initialize Mansonry
        let masonry = new Masonry(document.getElementById('mansonry'), {
            itemSelector: '.col',
            percentPosition: true,
        });
        // Layout Masonry after each image loaded
        imagesLoaded(document.getElementById('mansonry'), function() {
            masonry.layout();
        });
    </script>
@endsection
