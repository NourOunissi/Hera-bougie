<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommandesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Commandes
        DB::table('commandes')->insert([
            'num_commande' => 'commande1716714350',
            "date_commande" => "2024-05-26",
            "HT" => "100",
            "TVA" => "20",
            "TTC" => "120",
            "user_id" => 1,
        ]);
        DB::table('commandes')->insert([
            'num_commande' => 'commande1716714544',
            "date_commande" => "2024-05-26",
            "HT" => "100",
            "TVA" => "20",
            "TTC" => "120",
            "user_id" => 1,
        ]);
        DB::table('commandes')->insert([
            'num_commande' => 'commande1716714631',
            "date_commande" => "2024-05-26",
            "HT" => "100",
            "TVA" => "20",
            "TTC" => "120",
            "user_id" => 1,
        ]);
        // Lignes
        DB::table('lignes_commandes')->insert([
            'commande_id' => 1,
            "produit_id" => 1,
            "nom_produit" => "Hera",
            "HT" => 19.99,
            "TVA" => 4,
            "TTC" => 23.99,
            "quantite" => 4,
        ]);
        DB::table('lignes_commandes')->insert([
            'commande_id' => 1,
            "produit_id" => 2,
            "nom_produit" => "Clytia",
            "HT" => 19.99,
            "TVA" => 4,
            "TTC" => 23.99,
            "quantite" => 4,
        ]);

        DB::table('lignes_commandes')->insert([
            'commande_id' => 2,
            "produit_id" => 1,
            "nom_produit" => "Hera",
            "HT" => 19.99,
            "TVA" => 4,
            "TTC" => 23.99,
            "quantite" => 4,
        ]);
        DB::table('lignes_commandes')->insert([
            'commande_id' => 3,
            "produit_id" => 1,
            "nom_produit" => "Hera",
            "HT" => 19.99,
            "TVA" => 4,
            "TTC" => 23.99,
            "quantite" => 4,
        ]);
        DB::table('lignes_commandes')->insert([
            'commande_id' => 1,
            "produit_id" => 3,
            "nom_produit" => "Déméter",
            "HT" => 19.99,
            "TVA" => 4,
            "TTC" => 23.99,
            "quantite" => 4,
        ]);

    }
}
