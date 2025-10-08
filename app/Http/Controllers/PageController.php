<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\DestinasiWisata;
use App\Models\ProdukDesa;
use App\Models\PaketWisata;
use App\Models\Peta;
use App\Models\Kontak;
use App\Models\Dashboard;
use App\Models\PaketWisata2;

class PageController extends Controller
{
    public function dashboard()
    {
        $hero = Dashboard::where('section', 'hero')->first();
        $tentang = Dashboard::where('section', 'tentang')->first();
        $destinasi = Dashboard::where('section', 'destinasi')->first();
        $paket = Dashboard::where('section', 'paket')->first();
        $kontak = Kontak::latest()->first();

        $wisataRow1 = DestinasiWisata::whereNotNull('cardTitle')->latest()->take(3)->get();
        $wisataRow2 = DestinasiWisata::latest()->skip(3)->take(1)->first();
        $paketwisata = PaketWisata::latest()->skip(1)->take(4)->get();

        return view('pages.dashboard', compact(
            'hero',
            'tentang',
            'destinasi',
            'paket',
            'wisataRow1',
            'wisataRow2',
            'paketwisata',
            'kontak'
        ));
    }

    public function tentangKami()
    {
        $about = AboutUs::first();
        $kontak = Kontak::latest()->first();
        return view('pages.tentangkami', compact('about', 'kontak'));
    }

    public function destinasiWisata()
    {
        $wisata = DestinasiWisata::whereNotNull('cardTitle')->latest()->get();
        $title = DestinasiWisata::latest()->value('title');
        $background = DestinasiWisata::latest()->value('background');
        $kontak = Kontak::latest()->first();

        return view('pages.destinasiwisata', compact('wisata', 'title', 'background', 'kontak'));
    }

    public function produkDesa()
    {
        $produkdesa = ProdukDesa::whereNotNull('cardTitle')->latest()->get();
        $title = ProdukDesa::latest()->value('title');
        $background = ProdukDesa::latest()->value('background');
        $deskripsi = ProdukDesa::latest()->value('deskripsi');
        $kontak = Kontak::latest()->first();

        return view('pages.produkdesa', compact('produkdesa', 'title', 'deskripsi', 'background', 'kontak'));
    }

    public function paketWisata()
    {
        $paketwisata = PaketWisata::whereNotNull('cardTitle')->latest()->get();
        $pakets = PaketWisata2::with('itineraries')
            ->get()
            ->unique('label');
        $title = PaketWisata::latest()->value('title');
        $background = PaketWisata::latest()->value('background');
        $deskripsi = PaketWisata::latest()->value('deskripsi');
        $kontak = Kontak::latest()->first();
        return view('pages.paketwisata', compact('paketwisata', 'title', 'deskripsi', 'background', 'pakets', 'kontak'));
    }

    public function peta()
    {
        $all = Peta::latest()->get();

        $latest = $all->first();
        $peta   = $all->skip(1);

        $title = $latest?->title;
        $background = $latest?->background;
        $kontak = Kontak::latest()->first();

        return view('pages.peta', compact('peta', 'title', 'background', 'kontak'));
    }

    public function informasiKontak()
    {
        $title = Kontak::latest()->value('title');
        $kontak = Kontak::latest()->first();
        return view('pages.informasikontak', compact('title', 'kontak'));
    }

    public function Kontak()
    {
        $kontak = Kontak::latest()->first();
        return view('components.kontak', compact('kontak'));
    }

    public function sbadmin()
    {
        $kontak = Kontak::latest()->first();
        return view('pages.sbadmin', compact('kontak'));
    }
}
