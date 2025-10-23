<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dashboard;

class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hero Section
        Dashboard::create([
            'section' => 'hero',
            'title1' => 'DESA WISATA',
            'title2' => 'DESA JAGO-JAGO',
            'background' => 'images/bg1.jpg',
        ]);

        // Tentang Desa Wisata
        Dashboard::create([
            'section' => 'tentang',
            'title1' => 'Desa Wisata',
            'title2' => 'Desa Jago-jago',
            'konten' => 'Jago-jago adalah sebuah desa yang terletak di Kecamatan Badiri, Kabupaten Tapanuli Tengah, Sumatra Utara, yang memiliki topografi unik sebagai wilayah pesisir. Sebagian besar masyarakatnya menggantungkan hidup pada sektor pertanian, perkebunan, dan perikanan, mencerminkan adaptasi kuat terhadap lingkungan alamnya. Meskipun belum menjadi destinasi utama, desa ini menawarkan potensi wisata alam yang menarik, terutama bagi penggemar suasana pantai yang tenang dan kegiatan memancing.',
            'background' => 'images/jagojago.jpg',
        ]);

        // Destinasi Wisata Section
        Dashboard::create([
            'section' => 'destinasi',
            'title1' => 'Destinasi Wisata Jago-jago',
            'konten' => 'Objek Wisata Desa Sijago-jago adalah Pantai Pandan dan Masjid Agung Sibolga',
        ]);

        // Paket Wisata Section
        Dashboard::create([
            'section' => 'paket',
            'title1' => 'Paket Wisata Pilihan',
        ]);
    }
}
