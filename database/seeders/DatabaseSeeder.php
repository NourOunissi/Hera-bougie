<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([CouleursSeeder::class]);
        $this->call([CiresSeeder::class]);
        $this->call([ParfumSeeder::class]);
        $this->call([ProduitsSeeder::class]);
        $this->call([UsersSeeder::class]);
    }
}
