<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CiresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cires')->insert([
            'nom'  => 'Animale'
        ]);
        DB::table('cires')->insert([
            'nom'  => 'Minérale'
        ]);
        DB::table('cires')->insert([
            'nom'  => 'Végétale'
        ]);
    }
}
