@extends('layout.main')

@section('title', 'Galerie')
@section('image', asset('images/archive/large/2012_konzert_e.jpg'))
@section('abstract')
    Auf dieser Seite finden Sie einige Schnappschüsse auf dem Vereinsleben.
    Noch mehr aktuelle Bilder gibt es auf <a class="text-white" target="_blank" rel="noreferrer" href="https://www.instagram.com/musikalische.loewen/" >Instagram</a>.
@endsection

@section('main')
    <div class="container mt-5 mb-4">
        <div class="row row-cols-1 row-cols-md-4 g-4" id="lightgallery">
            @php
                $images = glob(public_path('images/archive/small').'/20*.jpg');
                natsort($images);
                $descriptions = [
                    '2010_konzert_afrika' => 'Konzert 2010: Afrika',
                    '2011_bw-musix_balingen' => 'Das Jugendorchester auf dem BWMusix Wettbewerb 2011 in Balingen',
                    '2011_gemeinschaftkonzert_ebernhahn' => 'Gemeinschaftskonzert 2011 mit dem Musikverein Ebernhahn',
                    '2011_kirchturmblasen_niedererbach' => 'Kirchturmblasen im Advent 2011 in Niedererbach',
                    '2011_vereinsausflug_calella' => 'Vereinsausflug 2011 auf das internationalen Oktoberfest nach Calella',
                    '2012_konzert_' => 'Konzert 2012: Concierto de Calella',
                    '2012_konzertreise_thueringen' => 'Konzertreise 2012 nach Thüringen',
                    '2013_heeresmusikkorps_workshop_JO' => 'Das Jugendorchester zu Gast beim Heeresmusikkorps in Koblenz',
                    '2013_vom_westerwald_in_den_wilden_westen' => 'Konzert 2012: Vom Westerwald in den Wilden Westen',
                    '2014_very_british' => 'Konzert 2014: Very British!',
                    '2015_mit_dem_wind_nach_westen' => 'Konzert 2015: Mit dem Wind nach Westen',
                    '2016_carnaval_de_paris' => 'Konzert 2016: Carnaval de Paris',
                    '2016_em_qualifikation_u21' => 'Begleitung eines EM-Qualifikationsspiels der U21 Fußball Nationalmannschaft 2016',
                    '2016_kirmes_nentershausen' => 'Kirmes 2016 in Nentershausen',
                    '2016_vereinsausflug_calella' => 'Vereinsausflug 2016 auf das internationalen Oktoberfest nach Calella',
                    '2016_wir_fuellen_das_stadion_frankfurt' => 'Teilnahme am Weltrekordversuch "Wir füllen das Stadion 2016" in der Commerzbank-Arena in Frankfurt',
                    '2017_karneval' => 'Karneval 2017',
                    '2017_konzert_stratosphaere' => 'Konzert 2017: Stratosphäre',
                    '2017_statosphaere' => 'Konzert 2017: Stratosphäre',
                    '2018_bb' => 'Die Big Band der Bundeswehr 2018 zu Gast in Nenterhausen',
                    '2018_der_musikalische_loewe' => 'Konzert 2018: Der Musikalische Löwe',
                    '2019_kirchturmblasen' => 'Kirchturmblasen Weihnachten 2019 in Nentershausen',
                    '2019_konzert_circus' => 'Konzert 2019: Circus in Nentershausen',
                    '2019_oktoberfest_montabaur' => 'Auftritt auf dem Oktoberfest 2019 in Montabaur',
                    '2019_volkstrauertag' => 'Volkstrauertag 2019',
                    '2019_weihnachtsmarkt' => 'Weihnachtsmarkt 2019 in Limburg',
                    '2020_karneval' => 'Veilchendienstagsumzug 2020 in Heimbach-Weis'
                ];
            @endphp
            @foreach(array_reverse($images) as $image)
                @php
                    $name = Str::afterLast($image, '/');
                    foreach($descriptions as $key => $description) {
                        if (Str::startsWith($name, $key)) {
                            break;
                        }
                        else {
                            $description = '';
                        }
                    }
                @endphp
                <div class="col">
                    <div class="card shadow-sm">
                        <a href="{{ asset('images/archive/large/'.$name) }}" class="card-img-wrap" data-sub-html="{{ $description }}">
                            <img src="{{ asset('images/archive/small/'.$name) }}" class="card-img-top" alt="{{ $description }}">
                        </a>
                    </div>
                </div>
            @endforeach
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
        let masonry = new Masonry(document.getElementById('lightgallery'), {
            itemSelector: '.col',
            percentPosition: true,
        });
        // Layout Masonry after each image loaded
        imagesLoaded(document.getElementById('lightgallery'), function() {
            masonry.layout();
        });
    </script>
@endsection

