<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaketWisata2;
use App\Models\Itinerary;

class PaketWisata2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ============================
        // PAKET WISATA 3D2N
        // ============================
        $paket3d2n = PaketWisata2::create(['label' => '3D2N']);

        $itineraries3d2n = [
            ['Hari 1', '04.00 – 04.30', 'Berkumpul di Lapangan Merdeka Medan, registrasi peserta, briefing perjalanan'],
            ['Hari 1', '04.30 – 12.30', 'Perjalanan menuju Pandan via Parapat'],
            ['Hari 1', '12.30 – 13.30', 'Tiba di Pandan, makan siang di restoran lokal'],
            ['Hari 1', '13.30 – 14.00', 'Check-in hotel di Pandan'],
            ['Hari 1', '14.00 – Malam', 'Free program: bermain di Pantai Pandan, bersantai di tepi pantai, mencoba jajanan lokal, melihat sunset'],

            ['Hari 2', '07.00 – 08.00', 'Sarapan di hotel, briefing'],
            ['Hari 2', '08.00 – 12.00', 'Kunjungan ke Desa Wisata Jago Jago – melihat aktivitas masyarakat pesisir dan hasil olahan lokal'],
            ['Hari 2', '12.00 – 13.00', 'Makan siang di restoran lokal'],
            ['Hari 2', '13.00 – 15.00', 'Perjalanan ke Sibolga City Tour: Pelabuhan Lama, Masjid Agung, Pasar Ikan, membeli oleh-oleh khas'],
            ['Hari 2', '15.00 – 19.30', 'Bersantai di Pantai Ujung Sibolga & Pantai Tapian Nauli, menikmati sunset'],
            ['Hari 2', '19.30 – 20.00', 'Perjalanan kembali ke hotel Pandan'],
            ['Hari 2', '20.00 – Malam', 'Hotel, makan malam, free program'],

            ['Hari 3', '06.00 – 07.00', 'Sarapan di hotel, check-out, briefing'],
            ['Hari 3', '07.00 – 13.00', 'Perjalanan kembali menuju Medan via Brastagi'],
            ['Hari 3', '13.00 – 14.00', 'Makan siang di restoran lokal'],
            ['Hari 3', '14.00 – 16.00', 'Singgah di Pasar Buah Berastagi & Bukit Gundaling, foto panorama Gunung Sinabung & Sibayak'],
            ['Hari 3', '16.00 – 19.00', 'Melanjutkan perjalanan menuju Medan'],
            ['Hari 3', '19.00', 'Perjalanan selesai'],
        ];

        foreach ($itineraries3d2n as $data) {
            Itinerary::create([
                'paket_wisata2_id' => $paket3d2n->id,
                'hari' => $data[0],
                'waktu' => $data[1],
                'deskripsi' => $data[2],
            ]);
        }

        // ============================
        // PAKET WISATA 2D1N
        // ============================
        $paket2d1n = PaketWisata2::create(['label' => '2D1N']);

        $itineraries2d1n = [
            ['Hari 1', '04.00 – 04.30', 'Berkumpul di Lapangan Merdeka Medan, registrasi peserta, briefing perjalanan'],
            ['Hari 1', '04.30 – 12.30', 'Perjalanan menuju Pandan via Parapat'],
            ['Hari 1', '12.30 – 13.30', 'Tiba di Pandan, makan siang di restoran lokal'],
            ['Hari 1', '13.30 – 14.00', 'Check-in hotel di Pandan'],
            ['Hari 1', '14.00 – Malam', 'Free program: bermain di Pantai Pandan, bersantai di tepi pantai, mencoba jajanan lokal, melihat sunset'],

            ['Hari 2', '07.00 – 08.00', 'Sarapan di hotel, briefing'],
            ['Hari 2', '08.00 – 12.00', 'Kunjungan ke Desa Wisata Jago Jago, melihat aktivitas masyarakat dan hasil olahan lokal'],
            ['Hari 2', '12.00 – 13.00', 'Makan siang di restoran lokal'],
            ['Hari 2', '13.00 – 19.00', 'Perjalanan kembali menuju Medan via Brastagi; singgah di Pasar Buah Brastagi & Bukit Gundaling untuk foto panorama Gunung Sinabung & Gunung Sibayak'],
            ['Hari 2', '19.00 – 22.00', 'Melanjutkan perjalanan menuju Medan'],
            ['Hari 2', '22.00', 'Perjalanan selesai'],
        ];

        foreach ($itineraries2d1n as $data) {
            Itinerary::create([
                'paket_wisata2_id' => $paket2d1n->id,
                'hari' => $data[0],
                'waktu' => $data[1],
                'deskripsi' => $data[2],
            ]);
        }

        // ============================
        // PAKET WISATA 1D
        // ============================
        $paket1d = PaketWisata2::create(['label' => '1D']);

        $itineraries1d = [
            ['Hari 1', '07.00 – 07.30', 'Berkumpul di titik temu Pandan, registrasi peserta, briefing perjalanan'],
            ['Hari 1', '07.30 – 10.00', 'Kunjungan ke Desa Wisata Jago Jago, melihat aktivitas masyarakat pesisir dan hasil olahan lokal'],
            ['Hari 1', '10.00 – 12.00', 'Wisata ke Pantai Pandan & Pantai Bosur, bermain air dan foto-foto'],
            ['Hari 1', '12.00 – 13.00', 'Makan siang di pantai'],
            ['Hari 1', '13.00 – 15.00', 'City tour Sibolga: Pelabuhan Lama, Masjid Agung, Pasar Ikan, membeli oleh-oleh khas Sibolga'],
            ['Hari 1', '15.00 – 17.00', 'Menikmati sunset di Pantai Ujung Sibolga'],
            ['Hari 1', '17.00', 'Perjalanan selesai'],
        ];

        foreach ($itineraries1d as $data) {
            Itinerary::create([
                'paket_wisata2_id' => $paket1d->id,
                'hari' => $data[0],
                'waktu' => $data[1],
                'deskripsi' => $data[2],
            ]);
        }
    }
}
