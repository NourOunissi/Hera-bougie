@extends('layouts.base')

@section('title', 'A propos')

@section('content')

<h1>Confirmation de la commande</h1>

<p>Merci pour votre commande. Nous vous enverrons un email de confirmation dès que possible.</p>

<a href="{{ route('app_bougie') }}">Retour à la boutique</a>

@endsection