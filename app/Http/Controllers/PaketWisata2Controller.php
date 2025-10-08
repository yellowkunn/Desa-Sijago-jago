<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata2;
use App\Models\Itinerary;
use Illuminate\Http\Request;

class PaketWisata2Controller extends Controller
{
    public function create()
    {
        $usedLabels = PaketWisata2::pluck('label')->toArray();

        $allLabels = ['2D1N', '3D2N', '4D3N', '5D4N', 'Custom'];

        $availableLabels = array_diff($allLabels, $usedLabels);

        return view('admin.paketwisata2.createpaketperjalanan', compact('availableLabels'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string',
            'itinerary' => 'required|array',
        ]);

        // Simpan paket wisata
        $paket = PaketWisata2::create([
            'label' => $request->label,
        ]);

        // Simpan itinerary
        foreach ($request->itinerary as $item) {
            Itinerary::create([
                'paket_wisata2_id' => $paket->id,
                'hari' => $item['hari'] ?? null,
                'waktu' => $item['waktu'] ?? null,
                'deskripsi' => $item['deskripsi'] ?? null,
            ]);
        }

        return redirect()->route('paketwisata.index')->with('success', 'Paket Wisata berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $paket = PaketWisata2::with('itineraries')->findOrFail($id);

        // ambil semua label yang sudah ada
        $usedLabels = PaketWisata2::pluck('label')->toArray();
        $allLabels = ['2D1N', '3D2N', '4D3N', '5D4N', 'Custom'];

        // izinkan label yang sedang dipakai paket ini
        $availableLabels = array_diff($allLabels, $usedLabels);
        $availableLabels[] = $paket->label;

        return view('admin.paketwisata2.editpaketperjalanan', compact('paket', 'availableLabels'));
    }

public function update(Request $request, $id)
{
    $paket = PaketWisata2::findOrFail($id);

    $request->validate([
        'label' => 'required|string',
        'itinerary' => 'nullable|array',
        'itinerary.*.hari' => 'nullable|string',
        'itinerary.*.waktu' => 'nullable|string',
        'itinerary.*.deskripsi' => 'nullable|string',
    ]);

    // hapus itinerary lama
    $paket->itineraries()->delete();

    $itineraries = $request->input('itinerary', []);

    // ✅ kalau itinerary kosong → hapus paket
    if (empty($itineraries)) {
        $paket->delete();
        return redirect()->route('paketwisata.index')
            ->with('success', 'Paket dihapus karena tidak ada itinerary.');
    }

    // ✅ kalau ada itinerary → update paket & simpan itinerary baru
    $paket->update([
        'label' => $request->label,
    ]);

    foreach ($itineraries as $itinerary) {
        $paket->itineraries()->create($itinerary);
    }

    return redirect()->route('paketwisata.index')->with('success', 'Paket berhasil diperbarui!');
}


}
