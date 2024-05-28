@extends('layouts.base')

@section('content')
    <!-- titre + bouton ajouter -->
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>Afficher une commande</h2>
            </div>
            <div class="pull-right my-2">
                <a class="btn btn-primary" href="{{ route('commandes.index') }}">Retour à la liste</a>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $commande->nom }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $commande->description }}
            </div>
        </div>

    </div>
@endsection
