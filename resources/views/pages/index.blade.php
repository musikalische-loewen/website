@extends('layout.base')

@section('navbar-fixed', True)

@section('description', 'Wir sind ein junger Musikverein aus Nentershausen im Westerwald und bieten Ihnen Musik für die verschiedensten Anlässe. Gerne kommen wir auch zu Ihrer Veranstaltung!')

@section('header')
    <header class="background-wrapper background-filter-light" style="min-height: 125vh;">
        <div class="background-image" style="background-image: url({{ asset('images/archive/large/2023_konzert_klang_der_alpen_gruppenfoto.jpg') }});"></div>
        <div class="background-text container d-flex flex-column align-items-center" style="height: 100vh;">
            <div class="my-auto text-center">
                        <h1>Willkommen...</h1>
                        <h2 class="mb-0">...auf der Website des Musikvereins "Musikalische Löwen" Nentershausen&nbsp;e.V.!</h2>
            </div>
            <div class="scroll pb-5">
                <a class="text-white" href="#news">
                    <span></span>
                    <span></span>
                    <span></span>
                    Mehr Infos &amp; News
                </a>
            </div>
        </div>
    </header>
@endsection

@section('main')
    <div class="container py-4" id="news">
        <div class="row row-cols-1 row-cols-md-3 g-4" id="lightgallery">
            <div class="col">
                <div class="card shadow-sm bg-primary text-white">
                    <div class="card-body">
                        <p class="card-text mb-3">
                            Wir sind ein junger Musikverein aus Nentershausen im Westerwald und bieten Ihnen Musik für die verschiedensten Anlässe. Gerne kommen wir auch zu Ihrer Veranstaltung,  <a href="{{ url('kontakt') }}">schreiben Sie uns eine Mail oder rufen Sie einfach an</a>!
                        </p>
                        <p class="card-text">
                            Nachfolgend finden Sie ein paar Neuigkeiten aus dem Vereinsleben. Noch mehr Neuigkeiten gibt es auf <a target="_blank" rel="noreferrer" href="https://www.instagram.com/musikalische.loewen/" >Instagram</a>.
                        </p>
                    </div>
                </div>
            </div>
            @foreach(\App\Models\Post::take(5)->get() as $post)
                <div class="col">
                    <div class="card shadow-sm">
                        <a href="{{ asset('storage/'.$post->path_display) }}" class="card-img-wrap">
                            <img src="{{ asset('storage/'.$post->path_thumbnail) }}" class="card-img-top" alt="{{ $post->accessibilityCaption }}">
                        </a>
                        <div class="card-body">
                            <p class="card-text">{{ $post->caption }}</p>
                            <p class="card-text"><small class="text-muted">Veröffentlicht {{ $post->date->diffForHumans()  }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--

      __  __           _ _         _ _          _            _                                      _____                _       _
     |  \/  |         (_) |       | (_)        | |          | |                                    / ____|              (_)     | |
     | \  / |_   _ ___ _| | ____ _| |_ ___  ___| |__   ___  | |     ___   _____      _____ _ __   | (___  _ __   ___ _____  __ _| |
     | |\/| | | | / __| | |/ / _` | | / __|/ __| '_ \ / _ \ | |    / _ \ / _ \ \ /\ / / _ \ '_ \   \___ \| '_ \ / _ \_  / |/ _` | |
     | |  | | |_| \__ \ |   < (_| | | \__ \ (__| | | |  __/ | |___| (_) |  __/\ V  V /  __/ | | |  ____) | |_) |  __// /| | (_| | |
     |_|  |_|\__,_|___/_|_|\_\__,_|_|_|___/\___|_| |_|\___| |______\___/ \___| \_/\_/ \___|_| |_| |_____/| .__/ \___/___|_|\__,_|_|
                                                                                                         | |
                                                                                                         |_|
    Herzlich Glückwunsch! Sie haben das Musikalische Löwen Spezial gefunden!
    Als Gewinn gibt es drei geheime YouTube Links:
    - Musiplantschen auf dem Herthasee: https://www.youtube.com/watch?v=rNR3o-FCjPw
    - Quellkartoffel und Dupp Dupp für vier Clowns: https://www.youtube.com/watch?v=f9ghAKP6IIE
    - Weihnachtsfeier: https://www.youtube.com/watch?v=GSnxeejk9mk
    Viel Spaß damit!

    -->
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
