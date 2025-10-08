<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DestinasiWisata;


class DestinasiWisataController extends Controller
{
    public function index()
    {
        $wisata = DestinasiWisata::whereNotNull('cardTitle')->latest()->get();
        $title = DestinasiWisata::latest()->value('title');
        $background = DestinasiWisata::latest()->value('background');
        return view('admin.wisata.index', compact('wisata', 'title', 'background'));
    }

    public function editwisata()
    {
        $title = DestinasiWisata::latest()->value('title');
        $wisata = DestinasiWisata::latest()->first();
        return view('admin.wisata.edit-wisata', compact('title', 'wisata'));
    }

    public function updatewisata(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'background' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $backgroundPath = null;

        if ($request->hasFile('background')) {
            $filename = time() . '.' . $request->background->extension();
            $request->background->move(public_path('uploads/wisata'), $filename);
            $backgroundPath = 'uploads/wisata/' . $filename;
        }

        DestinasiWisata::query()->update([
            'title' => $request->title,
            'background' => $backgroundPath,
        ]);

        return redirect()->route('wisata.index')->with('success', 'Semua tampilan wisata berhasil diperbarui');
    }

    public function create()
    {
        return view('admin.wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'background' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'cardTitle' => 'required|string|max:255',
            'cardContent' => 'required|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $filename = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/wisata'), $filename);
            $gambarPath = 'uploads/wisata/' . $filename;
        }

        DestinasiWisata::create([
            'title' => $request->title,
            'cardTitle' => $request->cardTitle,
            'cardContent' => $request->cardContent,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('wisata.index')->with('success', 'Destinasi wisata berhasil ditambahkan');
    }

    public function edit(DestinasiWisata $wisatum)
    {
        return view('admin.wisata.edit', compact('wisatum'));
    }

    public function update(Request $request, DestinasiWisata $wisatum)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'cardTitle' => 'required|string|max:255',
            'cardContent' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $filename = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/wisata'), $filename);
            $wisatum->gambar = 'uploads/wisata/' . $filename;
        }

        $wisatum->update([
            'title' => $request->title,
            'cardTitle' => $request->cardTitle,
            'cardContent' => $request->cardContent,
            'gambar' => $wisatum->gambar,
        ]);

        return redirect()->route('wisata.index')->with('success', 'Destinasi wisata berhasil diperbarui');
    }

    public function destroy(DestinasiWisata $wisatum)
    {
        $wisatum->delete();
        return redirect()->route('wisata.index')->with('success', 'Destinasi wisata berhasil dihapus');
    }
}
