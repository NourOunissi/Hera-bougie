@extends('layouts.base')

@section('title', 'Contact')

@section('content')
    @vite('resources/css/contact.css')
    <h1>Contactez-nous!</h1>

    <form action="#" method="get">
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
    <script>
        function showConfirmation(event) {
          event.preventDefault(); // Empêche l'envoi du formulaire par défaut

          Swal.fire({
            title: "Mail envoyé !",
            text: "Votre courrier électronique a été envoyé avec succès.",
            icon: "success",
            confirmButtonText: "OK"
          }).then(function () {
            // Réinitialiser le formulaire ici si nécessaire
            event.target.submit(); // Envoyer le formulaire après la confirmation
          });
        }
      </script>

@endsection
