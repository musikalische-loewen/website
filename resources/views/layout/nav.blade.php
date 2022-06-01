<div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('images/logos/logo_white.png') }}" height="32" width="66" class="mr-3" alt="Logo" />
        {{ config('app.name') }}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav mt-3 mt-lg-0">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
                    <i class="fa fa-music"></i>
                    Orchester
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ url('orchester/haupt') }}">
                            Blasorchester
                        </a></li>
                    <li><a class="dropdown-item" href="{{ url('orchester/jugend') }}">
                            Jugendorchester
                        </a></li>
                    <li><a class="dropdown-item" href="{{ url('orchester/kids') }}">
                            Kidsorchester
                        </a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
                    <i class="fa fa-users"></i>
                    Verein
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ url('verein/vorstand') }}">
                            Vorstand
                        </a></li>
                    <li><a class="dropdown-item" href="{{ url('verein/mitgliedschaft') }}">
                            Mitgliedschaft
                        </a></li>
                    <li><a class="dropdown-item" href="{{ url('verein/ausbildung') }}">
                            Ausbildung
                        </a></li>
                    <li><a class="dropdown-item" href="{{ url('verein/chronik') }}">
                            Chronik
                        </a></li>
                    {{--<li><a class="dropdown-item" href="{{ url('verein/presse') }}">
                            Presse
                        </a></li>--}}
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ url('galerie') }}" class="nav-link">
                    <i class="fa fa-image"></i>
                    Galerie
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('kontakt') }}" class="nav-link">
                    <i class="fa fa-envelope"></i>
                    Kontakt
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('intern') }}" class="nav-link ">
                    <i class="fa fa-lock"></i>
                    Intern
                </a>
            </li>
            <li class="nav-item">
                <a href="https://web.konzertmeister.app" class="nav-link" target="_blank" rel="noreferrer">
                    {{-- TODO: Replace icon --}}
                    <i class="fa fa-calendar-check"></i>
                    <span class="d-lg-none d-xl-none">Konzertmeister</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="https://www.instagram.com/musikalische.loewen/" class="nav-link" target="_blank" rel="noreferrer">
                    <i class="fab fa-instagram"></i>
                    <span class="d-lg-none d-xl-none">Instagram</span>
                </a>
            </li>
        </ul>
    </div>
</div>
