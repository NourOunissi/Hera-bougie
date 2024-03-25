<h1>Hi {{ $name }} Please reset your password!</h1>

<p>
    Nous avons reçu une demande de changement de votre mot de passe.
    Si vous n'êtes pas à l'origine de cette demande, veuillez nous en informer pour la sécurité de votre compte.
    <br> Si vous êtes l'initiateur, cliquez sur le lien ci-dessous pour réinitialiser votre mot de passe.<br>
    <a href="{{ route('app_changepassword', ['token' => $activation_token]) }}" target="_blank">Rénitialiser le mot de passe</a>
</p>

<p>
    HeraBougie security team.
</p>

