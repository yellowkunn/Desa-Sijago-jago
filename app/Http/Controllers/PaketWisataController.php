<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketWisata;
use App\Models\PaketWisata2;

class PaketWisataController extends Controller
{
    public function index()
    {
        $paketwisata = PaketWisata::whereNotNull('cardTitle')->latest()->get();
        $title = PaketWisata::latest()->value('title');
        $background = PaketWisata::latest()->value('background');
        $deskripsi = PaketWisata::latest()->value('deskripsi');
        $pakets = PaketWisata2::with('itineraries')
            ->get()
            ->unique('label');

        return view('admin.paketwisata.index', compact('paketwisata', 'title', 'deskripsi', 'background', 'pakets'));
    }

    public function editkonten()
    {
        $title = PaketWisata::latest()->value('title');
        $paketwisata = PaketWisata::latest()->first();
        $deskripsi = PaketWisata::latest()->value('deskripsi');
        return view('admin.paketwisata.edit', compact('title', 'deskripsi', 'paketwisata'));
    }

    public function updatekonten(Request $request)
    {
        try {
            $request->validate([
                'title' => 'nullable|string|max:255',
                'background' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
                'deskripsi' => 'nullable|string',
            ]);

            $backgroundPath = null;

            if ($request->hasFile('background')) {
                $filename = time() . '.' . $request->background->extension();
                $request->background->move(public_path('uploads/paketwisata'), $filename);
                $backgroundPath = 'uploads/paketwisata/' . $filename;
            }

            PaketWisata::query()->update([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'background' => $backgroundPath,
            ]);
            return redirect()->route('paketwisata.index')->with('success', 'Tampilan berhasil diperbarui');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function create()
    {
        $deskripsi = PaketWisata::latest()->value('deskripsi');
        return view('admin.paketwisata.create', compact('deskripsi'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'nullable|string|max:255',
                'deskripsi' => 'nullable|string',
                'cardTitle' => 'required|string|max:255',
                'harga'  => 'nullable|string|max:255',
                'gambar' => 'required|image|mimes:jpg,jpeg,png|max:10240',
            ]);

            $gambarPath = null;
            if ($request->hasFile('gambar')) {
                $filename = time() . '.' . $request->gambar->extension();
                $request->gambar->move(public_path('uploads/paketwisata'), $filename);
                $gambarPath = 'uploads/paketwisata/' . $filename;
            }

            PaketWisata::create([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'cardTitle' => $request->cardTitle,
                'harga' => $request->harga,
                'gambar' => $gambarPath,
            ]);
            return redirect()->route('paketwisata.index')->with('success', 'paket wisata berhasil ditambahkan');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit(PaketWisata $paketwisata)
    {
        $deskripsi = PaketWisata::latest()->value('deskripsi');
        return view('admin.paketwisata.editpaket', compact('paketwisata', 'deskripsi'));
    }

    public function update(Request $request, PaketWisata $paketwisata)
    {
        try {
            $request->validate([
                'title' => 'nullable|string|max:255',
                'deskripsi' => 'nullable|string',
                'cardTitle' => 'required|string|max:255',
                'harga'  => 'nullable|string|max:255',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            ]);

            if ($request->hasFile('gambar')) {
                $filename = time() . '.' . $request->gambar->extension();
                $request->gambar->move(public_path('uploads/paketwisata'), $filename);
                $paketwisata->gambar = 'uploads/paketwisata/' . $filename;
            }

            $paketwisata->update([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'cardTitle' => $request->cardTitle,
                'harga' => $request->harga,
                'gambar' => $paketwisata->gambar,
            ]);
            return redirect()->route('paketwisata.index')->with('success', 'paket wisata berhasil diperbarui');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(PaketWisata $paketwisata)
    {
        try {
            $paketwisata->delete();
            return redirect()->route('paketwisata.index')->with('success', 'paket wisata berhasil dihapus');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
