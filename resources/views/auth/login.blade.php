@extends('layouts.base')

@section('title', 'Login')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h1 class="text-center text-muted mb-5">
                    Veuillez vous connecter</h1>
                <p class="text-center text-muted mb-5">
                    Vos articles vous attendent.</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- on inclus les messages n'alert --}}
                    @include('alerts.alert-message')

                    @error('email')
                        <div class="alert alert-dark text-center" role="alert">
                            {{ $message }}
                        </div>
                    @enderror


                    @error('password')
                        <div class="alert alert-dark text-center" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email"
                        class="form-control mb-3 @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                        autocomplete="email" autofocus>

                    <label for="password" class="form-label">
                        Mot de passe</label>
                    <input type="password" name="password" id="password"
                        class="form-control mb-3 @error('password') is-invalid @enderror" required
                        autocomplete="current-password">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="remember"
                                    name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Se souvenir de moi</label>
                            </div>
                        </div>

                        <div class="col-md-6 text-end ">
                            <a class="text-light" href="{{ route('app_forgotpassword')}}">
                                Mot de passe oublié ? </a>
                        </div>
                    </div>


                    <div class="d-grid gap-2">
                        <button class="btn btn-light" type="submit">
                            Connexion</button>
                    </div>

                    <p class="text-center text-muted mt-5">
                        Pas encore inscrit ? <a class="text-light"
                            href="{{ route('register') }}">
                            Créer un compte</a></p>
                </form>

            </div>
        </div>
    </div>



    </body>
@endsection
