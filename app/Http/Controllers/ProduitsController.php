<?php
namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Couleur;
use App\Models\Cire;
use Illuminate\Http\Request;

class ProduitsController extends Controller
{
    public function bougie(Request $request)
    {
        $couleurId = $request->query('couleur');
        $cireId = $request->query('cire');

        $produits = Produit::join('couleurs', 'produits.couleur_id', '=', 'couleurs.id')
            ->join('parfums', 'produits.parfum_id', '=', 'parfums.id')
            ->join('cires', 'produits.cire_id', '=', 'cires.id')
            ->where('produits.actif', '=', true)
            ->where('produits.type', '=', 'Bougie')
            ->when($couleurId, function ($query, $couleurId) {
                $query->where('produits.couleur_id', '=', $couleurId);
            })
            ->when($cireId, function ($query, $cireId) {
                $query->where('produits.cire_id', '=', $cireId);
            })
            ->where('produits.type', '=', 'Bougie')
            ->select('produits.*', 'couleurs.nom as couleur', 'parfums.nom as parfum', 'cires.nom as cire')
            ->get();

        $couleurs = Couleur::all();
        $cires = Cire::all();

        return view('bougie', compact('produits', 'couleurs', 'couleurId', 'cires', 'cireId'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Logique pour rechercher les articles dont le modèle commence par la requête
        $produits = Produit::where('modele', 'like', $query . '%')->get();

        return view('bougie', compact('produits'));
    }

}
