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
            @endphp
            @foreach(array_reverse($images) as $image)
                @php
                    $name = Str::afterLast($image, '/');
                    $year = Str::before($name, '_');
                    $description = Str::of(Str::beforeLast(Str::after($name, '_'), '_'))->replace('_', ' ')->rtrim('.jpg')->title();
                @endphp
                <div class="col">
                    <div class="card shadow-sm">
                        <a href="{{ asset('images/archive/large/'.$name) }}" class="card-img-wrap" data-sub-html="{{ $year }}: {{ $description }}">
                            <img src="{{ asset('images/archive/small/'.$name) }}" class="card-img-top" alt="{{ $year }}: {{ $description }}">
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

