<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Philippe',
            'email' => 'philippe.kurz@gmail.com',
            "password" => bcrypt('12345678'),
            'is_verified' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Nour',
            'email' => 'nour.ounissi@gmail.com',
            "password" => bcrypt('12345678'), 
            'is_verified' => 1,
        ]);
    }
}
