<?php
namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitsController extends Controller
{
    public function bougie()
    {
        $produits = Produit::join('couleurs', 'produits.couleur_id', '=', 'couleurs.id')
            ->join('parfums', 'produits.parfum_id', '=', 'parfums.id')
            ->join('cires', 'produits.cire_id', '=', 'cires.id')
            ->where('produits.actif', '=', true)
            ->where('produits.type', '=', 'Bougie')
            ->select('produits.*', 'couleurs.nom as couleur', 'parfums.nom as parfum', 'cires.nom as cire')
            ->get();

        return view('bougie', compact('produits'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Logique pour rechercher les articles dont le modèle commence par la requête
        $produits = Produit::where('modele', 'like', $query . '%')->get();

        return view('bougie', compact('produits'));
    }

}
