@extends('layouts.base')

@section('content')
    <!-- titre + bouton ajouter -->
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>Liste des commandes</h2>
            </div>

        </div>
    </div>
    <table class="table table-bordered"> <!-- tableau pour afficher -->
        <tr>
            <th>Num_</th>
            <th>Nom</th>
            <th>Details</th>
            <th>No</th>
            <th>Nom</th>
            <th>Details</th>
            <th width="320px"></th>
        </tr>

        @foreach ($commandes as $commande) <!-- boucle pour aller recupper dans la bd de donner chaque element -->
            <tr>
                <td>{{ $commande->id }}</td>
                <td>{{ $commande->num_commande }}</td>
                <td>{{ $commande->date_commande }}</td>
                <td>{{ $commande->HT }}</td>
                <td>{{ $commande->TTC }}</td>
                <td>{{ $commande->TVA }}</td>
                <td>

                    <a class="btn btn-info" href="{{ route('commandes.show', $commande->id)}}">Détail</a> <!-- relier le bouton detail a show -->
                </td>
            </tr>
        @endforeach
        </table>
@endsection
