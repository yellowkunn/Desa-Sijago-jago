<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DestinasiWisata;

class DestinasiWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DestinasiWisata::create([
            'title' => 'Destinasi Wisata',
            'background' => 'images/bg2.jpg',
        ]);
        $data = [
            [
                'title' => 'Destinasi Wisata',
                'background' => 'images/bg2.jpg',
                'cardTitle' => 'Pantai Pandan',
                'gambar' => 'images/destinasi/destinasi1.jpg',
                'cardContent' => "Pantai Pandan adalah salah satu pantai paling populer di kawasan pesisir barat Sumatera Utara. Pantai ini dikenal dengan pasir putih yang lembut, ombak yang tenang, serta panorama laut biru yang menawan. Suasana pantai cukup ramai terutama saat sore hari karena menjadi lokasi favorit masyarakat lokal maupun wisatawan untuk menikmati sunset."
            ],
            [
                'title' => 'Destinasi Wisata',
                'background' => 'images/bg2.jpg',
                'cardTitle' => 'Masjid Agung Sibolga',
                'gambar' => 'images/destinasi/destinasi2.jpg',
                'cardContent' => "Masjid Agung Sibolga adalah salah satu ikon religi dan pusat aktivitas keagamaan masyarakat Muslim di Kota Sibolga. Masjid ini juga menjadi landmark kota yang sering dikunjungi wisatawan, baik untuk beribadah maupun sekadar menikmati keindahan arsitekturnya. Bangunan masjid berdiri megah dengan arsitektur modern yang dipadukan sentuhan tradisional, menjadikannya salah satu masjid termegah di kawasan pesisir barat Sumatera Utara."
            ],
        ];

        foreach ($data as $item) {
            DestinasiWisata::create($item);
        }
    }
}
