<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produits')->insert([
            'nom'  => 'Hera',
            'description'  => 'Héra, la reine , incarne la puissance maternelle et la protection du foyer ',
            'actif'  => true,
            'stock'  => 10,
            'couleur_id'  => 1,
            'parfum_id'  => 1,
            'cire_id'  => 1,
            'prix'  => 19.99,
            'taille'  => 'S',
            'type'  => 'Bougie',
            'image'  => 'hera.png'
        ]);

        DB::table('produits')->insert([
            'nom'  => 'Clytia',
            'description'  => 'Clytia, illustrant la passion insatiable et la transformation dans la mythologie grecque',
            'actif'  => true,
            'stock'  => 10,
            'couleur_id'  => 1,
            'parfum_id'  => 1,
            'cire_id'  => 2,
            'prix'  => 19.99,
            'taille'  => 'S',
            'type'  => 'Bougie',
            'image'  => 'clytia.png'
        ]);

        DB::table('produits')->insert([
            'nom'  => 'Déméter',
            'description'  => 'Déméter,  fait prospérer la terre avec sa bienveillance maternelle',
            'actif'  => true,
            'stock'  => 10,
            'couleur_id'  => 1,
            'parfum_id'  => 1,
            'cire_id'  => 3,
            'prix'  => 19.99,
            'taille'  => 'S',
            'type'  => 'Bougie',
            'image'  => 'demetra.png'
        ]);

        DB::table('produits')->insert([
            'nom'  => 'Méduse',
            'description'  => 'Méduse, la créature énigmatique, incarne le pouvoir mystique et la beauté terrifiante',
            'actif'  => true,
            'stock'  => 10,
            'couleur_id'  => 1,
            'parfum_id'  => 1,
            'cire_id'  => 2,
            'prix'  => 19.99,
            'taille'  => 'S',
            'type'  => 'Bougie',
            'image'  => 'meduse.png'
        ]);

        DB::table('produits')->insert([
            'nom'  => 'Aphrodite',
            'description'  => 'Aphrodite, amour et de  beauté, répand son charme envoûtant et inspire les passions les plus profondes',
            'actif'  => true,
            'stock'  => 10,
            'couleur_id'  => 1,
            'parfum_id'  => 1,
            'cire_id'  => 3,
            'prix'  => 19.99,
            'taille'  => 'S',
            'type'  => 'Bougie',
            'image'  => 'aphrodite.png'
        ]);
    }
}
