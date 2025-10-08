<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaketWisata;

class PaketWisataSeeder extends Seeder
{
    public function run(): void
    {
        PaketWisata::create([
            'title' => 'Paket Wisata',
            'background' => 'images/bg2.jpg',
            'deskripsi' => 'Paket wisata umumnya menawarkan pengalaman menyeluruh yang memadukan keindahan alam, petualangan, dan interaksi budaya. Wisatawan dapat menikmati suasana hutan hujan tropis, mengamati satwa liar, menjelajahi pegunungan , serta mengenal kehiudpan Masyarakat setempat melalui kegiatan budaya dan kuliner. Paket ini dirancang untuk memberikan pengalaman yang autentik sekaligus mendukung pariwisata berkelanjutan dikawasan tersebut.',
        ]);

        $data = [
        ];

        foreach ($data as $item) {
            PaketWisata::create($item);
        }
    }
}
