@extends('layouts.base')

@section('title', 'Contact')

@section('content')
    @vite('resources/css/contact.css')
    <h1>Contactez-nous ljlhjhjjkhjghjg!</h1>

    <form action="#" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <div class="d-grid gap-2">
            <button class="btn btn-light" type="submit">Envoyer</button>
        </div>
    </form>

@endsection
