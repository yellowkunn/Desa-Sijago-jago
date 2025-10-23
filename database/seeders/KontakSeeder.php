<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kontak;

class KontakSeeder extends Seeder
{
    public function run(): void
    {
        Kontak::create([
            'title' => 'Kontak',
            'background' => 'images/bg2.jpg',
            'lokasi' => 'Bunga Bondar, Kec. Badiri, Kabupaten Tapanuli Tengah, Sumatera Utara',
            'maps'   => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63812.8914213351!2d98.75377636844796!3d1.5777484941648974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302eeb55c5a0cc17%3A0x3106fd42f0ce74e3!2sJago%20Jago%2C%20Kec.%20Badiri%2C%20Kabupaten%20Tapanuli%20Tengah%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1759581501785!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'whatsapp'     => '',
            'email'  => '',
        ]);
    }
}
