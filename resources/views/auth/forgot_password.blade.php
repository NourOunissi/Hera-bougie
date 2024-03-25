@extends('layouts.base')

@section('title', 'Forgot password')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h1 class="text-center text-muted mb-5">
                    Mot de passe oublié</h1>
                <p class="text-center text-muted mb-5">
                    Veuillez entrer votre adresse e-mail. Nous vous enverrons un lien pour réinitialiser votre mot de passe.</p>

                <form action="{{ route('app_forgotpassword') }}" method="post">
                    @csrf

                      {{-- on inclus les messages n'alert --}}
                      @include('alerts.alert-message')

                      <label for="email-send" class="form-label">E-mail</label>
                      <input type="email" name="email-send" id="email-send" class="form-control @error('email-error') valid @enderror @error('email-error') is-invalid @enderror" placeholder="Please enter your email adress" value="@if(Session::has('old_email')) {{ Session::get('old_email') }}@endif" required>

                      <div class="d-grid gap-2 mt-5">
                        <button class="btn btn-light" type="submit">Réinitialiser le mot de passe</button>
                    </div>

                    <p class="text-center text-muted">Back to <a href="{{ route('login')}}">
                        Connexion</a></p>


                </form>
            </div>
        </div>
    </div>







@endsection
