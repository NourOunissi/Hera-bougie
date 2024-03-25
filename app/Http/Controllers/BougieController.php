<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Produit;

class BougieController extends Controller
{

    private function calculateTotalPrice($cartItems)
    {
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return $totalPrice;
    }

    public function index()
    {
        /*
        // Récupérer les articles du panier depuis la session
        $cartItems = Session::get('cart', []);

        // Calculer le prix total
        $totalPrice = $this->calculateTotalPrice($cartItems);

        return view('bougie', ['cartItems' => $cartItems, 'totalPrice' => $totalPrice]);
        */

        return view('bougie');

    }







    public function clearBougie()
    {
        // Supprimez le panier de la session
        Session::forget('cart');

        // Ajoutez également une nouvelle entrée vide dans la session pour forcer la mise à jour immédiate
        Session::put('cart', []);

        // Retournez une réponse JSON indiquant le succès de l'opération
        return response()->json(['message' => 'Le panier a été vidé avec succès']);
    }

}
