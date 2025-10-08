<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peta;

class PetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peta::create([
            'title' => 'Peta',
            'background' => 'images/bg2.jpg',
            'gambar' => null,
        ]);

        Peta::create([
            'title' => 'Peta',
            'background' => null,
            'gambar' => 'images/Peta/Peta.jpg',
        ]);
    }
}
