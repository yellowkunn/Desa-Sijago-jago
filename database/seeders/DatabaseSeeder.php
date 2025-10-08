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
    $this->call([
        UserSeeder::class,
        KontakSeeder::class,
        DestinasiWisataSeeder::class,
        ProdukDesaSeeder::class,
        PaketWisataSeeder::class,
        PetaSeeder::class,
        DashboardSeeder::class,
        TentangKamiSeeder::class,
        PaketWisata2Seeder::class,
    ]);
    }
}
