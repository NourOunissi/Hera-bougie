<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParfumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parfums')->insert([
            'nom'  => 'vanille'
        ]);
        DB::table('parfums')->insert([
            'nom'  => 'fraise'
        ]);
        DB::table('parfums')->insert([
            'nom'  => 'banane'
        ]);
    }
}
