<?php

namespace App\Http\Controllers;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;



class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $commandes = Commande::all()->sortBy("id"); // va recuperer tout les commandes dans la base de donne
        return view('commandes.index', compact("commandes")); // compact je le fais passer dans la vue
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('commandes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => 'required'
        ]);
        Commande::create($request->all());
        return redirect()->route("commandes.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande): View
    {
        return view("commandes.show", compact("commande"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande): View
    {
        return view('commandes.edit', compact('commande'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
