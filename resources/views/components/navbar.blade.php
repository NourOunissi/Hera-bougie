<!-- <link rel="stylesheet" href="{{ asset('assets/app.css') }}"> -->

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand mx-auto" href="{{ route('app_home') }}">
            <img src="/assets/img/logo.png" width="45" height="45" alt="">
        </a>
        <a class="navbar-brand" aria-current="page" href="{{ route('app_home') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            {{-- pour le boutton menu responsive --}} aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if (Request::route()->getName() == 'app_home') active @endif" aria-current="page"
                        href="{{ route('app_home') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Request::route()->getName() == 'app_bougie') active @endif" aria-current="page"
                        href="{{ route('app_bougie') }}">Bougies</a>
                </li>

            </ul>

            <ul class="navbar-nav ml-md-auto">
                <li class="nav-item">
                    <a class="nav-link @if (Request::route()->getName() == 'app_about') active @endif" aria-current="page"
                        href="{{ route('app_about') }}">A propos de nous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Request::route()->getName() == 'app_contact') active @endif" aria-current="page"
                        href="{{ route('app_contact') }}">Contact</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link @if (Request::route()->getName() == 'app_panier') active @endif" aria-current="page"
                        href="{{ route('app_panier') }}">Panier </a>
                </li>

                <!-- Non connecté -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('login') }}">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('register') }}">Inscription</a>
                    </li>
                @endguest

                <!-- Connecté -->
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('app_logout') }}">Se déconnecter</a></li>
                            <li><a class="dropdown-item" href="{{ route('app_cancel_account') }}">Supprimer le compte</a></li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>

    </div>
</nav>
