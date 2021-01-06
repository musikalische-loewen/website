@extends('layout.base')

@section('header')
    @if(View::hasSection('title') or View::hasSection('abstract'))
        <header class="background-wrapper background-filter-dark d-flex align-items-center">
            @hasSection('image')
            <div class="background-image" style="background-image: url(@yield('image'));"></div>
            @endif
            <div class="background-text container py-5">
                @hasSection('title')
                    <h1>
                        @yield('title')
                    </h1>
                @endif
                @hasSection('abstract')
                    <div class="row align-items-start">
                        <div class="col col-md-9">
                            <p class="mb-0">
                                @yield('abstract')
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </header>
    @endif
@endsection
