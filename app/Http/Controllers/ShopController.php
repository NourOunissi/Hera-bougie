<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{

    // ajoute un produit au panier
    public function addToCart(Request $request)
    {
        $produit_id = $request->produit_id;
        $newQuantity = $request->quantity;

        // Validation des données
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Récupérer l'article à partir de la base de données
        $produit = Produit::findOrFail($produit_id);

        // Récupérer le panier actuel depuis la session
        $cartItems = Session::get('cart', []);


        // Vérifier si l'article est déjà dans le panier
        $existingItemKey = array_search($produit_id, array_column($cartItems, 'id'));

        if ($existingItemKey === false) {
            // L'article n'est pas encore dans le panier
            // Ajoutez-le avec une quantité de 1
            $cartItems[] = [
                'id' => $produit->id,
                'nom' => $produit->nom,
                'image' => $produit->image,
                'price' => $produit->prix,
                'quantity' => $newQuantity,
                'tailles' => $produit->taille
            ];

        } else {
            // L'article est déjà dans le panier
            // Vous pouvez retourner une réponse pour indiquer que l'opération a été effectuée avec succès
            //return response()->json(['message' => 'Article déjà dans le panier']);

            $cartItems[$existingItemKey]['quantity'] += $newQuantity;

        }

        // Mettre à jour le panier dans la session
        Session::put('cart', $cartItems);

        // Calculer le nouveau prix total
        $totalPrice = $this->calculateTotalPrice($cartItems);

        // Retourner une réponse JSON avec le message et le nouveau prix total
        return response()->json(['message' => 'Article ajouté au panier avec succès', 'totalPrice' => $totalPrice]);


    }
    // Méthode privée pour calculer le prix total des articles dans le panier
    private function calculateTotalPrice($cartItems)
    {
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return $totalPrice;
    }

    // Méthode pour mettre à jour la quantité d'un article dans le panier
    public function updateItemQuantity(Request $request)
    {
        // Validation des données
        $request->validate([
            'id_produits' => 'required|exists:produits,id',
            'quantity' => 'required|integer|min:0',
        ]);



        // Récupérer le panier actuel depuis la session
        $cartItems = Session::get('cart', []);

        // Trouver l'index de l'article dans le panier
        $itemIndex = array_search($request->id_produits, array_column($cartItems, 'id'));

        // Mettre à jour la quantité de l'article dans le panier
        if ($itemIndex !== false) {
            $cartItems[$itemIndex]['quantity'] = $request->quantity;

            // Mettre à jour le panier dans la session
            Session::put('cart', $cartItems);

            // Calculer le nouveau prix total
            $totalPrice = $this->calculateTotalPrice($cartItems);

            // Retourner une réponse JSON avec le message, le nouveau prix total et le panier mis à jour
            return response()->json([
                'message' => 'Quantité mise à jour avec succès',
                'totalPrice' => $totalPrice,
                'cart' => $cartItems,

            ]);
        }

        // Retourner une réponse JSON avec un message d'erreur si l'article n'est pas trouvé dans le panier
        return response()->json(['error' => 'Article non trouvé dans le panier']);
    }

    public function panier()
    {
        // Récupérer les articles du panier depuis la session
        $cartItems = Session::get('cart', []);

        // Calculer le prix total
        $totalPrice = $this->calculateTotalPrice($cartItems);

        return view('panier', ['cartItems' => $cartItems, 'totalPrice' => $totalPrice]);
    }

    // Méthode pour passer une commande
    public function passerCommande()
    {

        // Vérifiez si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour passer une commande.');
        }

        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer les articles du panier depuis la session
        $cartItems = Session::get('cart', []);

        //die (var_dump($cartItems));

        // Créer une nouvelle commande
        $commande = new Commande();
        $commande->num_commande = 'commande' . time();
        $commande->date_commande = now();
        $commande->user_id = $user->id;
        $commande->HT = 100;
        $commande->TTC = 120;
        $commande->TVA = 20;
        $commande->save();

        // Ajouter les articles de la commande
        foreach ($cartItems as $item) {
            $commande->Lignes()->create([
                'produit_id' => $item['id'],
                'user_id' => $user->id,
                'nom_produit' => $item['nom'],
                'HT' => $item['price'],
                'TTC' => $item['price'] * 1.2,
                'TVA' => $item['price'] * 0.2,
                'quantite' => $item['quantity'],
            ]);
        }

        // Vider le panier
        Session::forget('cart');

        // Rediriger l'utilisateur vers la page de confirmation de commande
        //return redirect()->route('confirmation-commande');
        return view('confirmation-commande', ['commande' => $commande, 'articles' => $cartItems]);

    }

    // Méthode pour afficher la confirmation de commande
    public function confirmationCommande($id)
    {
        return "Commande enregistrée.";
    }

    public function clearBougieArticle(Request $request)
    {

        // Validation des données
        $request->validate([
            'produits_id' => 'required|exists:produits,id',
        ]);

        // Récupérer le panier actuel depuis la session
        $cartItems = Session::get('cart', []);

        // Trouver l'index de l'article dans le panier
        $itemIndex = array_search($request->produits_id, array_column($cartItems, 'id'));

        if ($itemIndex !== false) {
            // Retirer l'article du panier
            array_splice($cartItems, $itemIndex, 1);

            // Mettre à jour le panier dans la session
            Session::put('cart', $cartItems);

            // Calculer le nouveau prix total
            $totalPrice = $this->calculateTotalPrice($cartItems);

            // Retourner une réponse JSON avec le message, le nouveau prix total et le panier mis à jour
            return response()->json([
                'message' => 'Article supprimé avec succès',
                'totalPrice' => $totalPrice,
                'cart' => $cartItems,
            ]);
        }

        // Retourner une réponse JSON avec un message d'erreur si l'article n'est pas trouvé dans le panier
        return response()->json(['error' => 'Article non trouvé dans le panier']);
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
