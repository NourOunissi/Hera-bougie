@extends('layouts.base')

@section('title', 'Change password')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h1 class="text-center text-muted mb-5">
                    Changer le mot de passe</h1>
                <p class="text-center text-muted mb-5">
                    Veuillez entrer votre nouveau mot de passe</p>

                <form action="{{ route('app_changepassword', ['token' => $activation_token]) }}" method="post">
                    @csrf


                    {{-- on inclus les messages n'alert --}}
                    @include('alerts.alert-message')

                    <label for="new-password" class="form-label">
                        Nouveau mot de passe</label>
                    <input type="password" name="new-password" id="new-password" class="form-control mb-3 @error('password-error') is-invalid @enderror @error('password-success') is-valid @enderror" placeholder="Enter the new password" value="@if(Session::has('old-new-password')){{ Session::get('old-new-password') }}@endif">

                    <label for="new-password-confirm" class="form-label">Confirmation du mot de passe</label>
                    <input type="password" name="new-password-confirm" id="new-password-confirm" class="form-control mb-3 @error('password-error-confirm') is-invalid @enderror" placeholder="confirm you new password" value="@if(Session::has('old-new-password')){{ Session::get('old-new-password-confirm') }}@endif">

                    <div class="d-grid gap-2 mt-5">
                        <button class="btn btn-light" type="submit">
                            Nouveau mot de passe</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
