<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutUs;

class TentangKamiSeeder extends Seeder
{
    public function run(): void
    {
        AboutUs::create([
            'title' => 'Desa Wisata Sijago-Jago',
            'background' => 'images/bg2.jpg',
            'content' => "Jago-Jago adalah sebuah desa yang terletak di Kecamatan Badiri, Kabupaten Tapanuli Tengah, Sumatra Utara. Desa ini memiliki topografi unik sebagai wilayah pesisir dengan mayoritas masyarakatnya menggantungkan hidup pada sektor pertanian, perkebunan, dan perikanan. Kehidupan masyarakat Jago-Jago mencerminkan adaptasi kuat terhadap lingkungan alamnya, dengan etos kerja yang terbentuk dari ritme laut dan musim tanam. Suasana desa yang sibuk namun tetap guyub menjadi ciri khas kehidupan sosial masyarakatnya.

Meskipun belum dikenal luas sebagai destinasi utama, Desa Wisata Sijago-jago menyimpan potensi wisata alam yang menarik, khususnya bagi wisatawan yang mencari ketenangan suasana pantai atau kegiatan memancing di laut. Letaknya yang strategis hanya berjarak sekitar 12 kilometer dari Sibolga dan 100 kilometer dari Padangsidimpuan, dengan akses jalan beraspal yang mudah dilalui, menjadikannya pilihan menarik sebagai destinasi wisata tersembunyi di pesisir Tapanuli Tengah.

Selain keindahan alam, Jago-Jago juga menawarkan kekayaan budaya dan sejarah. Potensi wisata budaya dapat ditemukan melalui pertunjukan seni Batak Toba, cerita rakyat, hingga adat istiadat dan upacara lokal yang masih terjaga. Kuliner khas pesisir Sibolga menjadi daya tarik tambahan, memperkaya pengalaman wisata dengan cita rasa lokal. Di sisi lain, situs bersejarah Bongal yang terletak di kawasan ini menyimpan nilai penting sebagai jejak maritim kuno, dan berpotensi besar dikembangkan menjadi destinasi wisata edukasi sejarah.

Potensi ekonomi kreatif juga tumbuh dari masyarakatnya, dengan produk lokal berbasis bahan laut, kerajinan tangan, serta suvenir yang mencerminkan identitas budaya setempat. Workshop kerajinan lokal memungkinkan wisatawan berinteraksi langsung dengan pengrajin, sementara atraksi seperti trekking sejarah ke Situs Bongal atau pertunjukan seni di tepi sungai dapat memperkuat daya tarik wisata desa ini.

Secara sosial ekonomi, Desa Jago-Jago didominasi oleh komunitas nelayan dan petani. Nelayan terbiasa berbagi hasil tangkapan, sementara petani saling membantu dalam musim tanam, mencerminkan solidaritas yang kuat. Musyawarah dan hubungan kekeluargaan menjadi fondasi dalam kehidupan bermasyarakat, menjadikan desa ini tidak hanya menarik secara alam dan budaya, tetapi juga menawarkan pengalaman interaksi sosial yang khas.",
            'visi' => 'Visi',
            'visiContent' => 'Menjadi pusat wisata sejarah dan budaya maritim di Pantai Barat Sumatera yang mendunia melalui pengembangan Situs Bongal dan Museum Fansuri.',
            'misi' => 'Misi',
            'misiContent' => json_encode([
                'Melestarikan dan merawat Situs Bongal sebagai warisan sejarah abad ke-7.',
                'Mengembangkan wisata edukasi sejarah dan budaya maritim Nusantara.',
                'Memberdayakan masyarakat desa sebagai pemandu wisata dan pelaku ekonomi kreatif.',
                'Menyusun paket wisata budaya, sejarah, dan ekowisata pantai.',
                'Menjalin kerjasama dengan lembaga riset, pemerintah, dan komunitas.',
            ]),
            'gambar' => 'images/jagojago2.jpg'
        ]);
    }
}
