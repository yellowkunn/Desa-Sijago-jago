<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukDesa;

class ProdukDesaController extends Controller
{
    public function index()
    {
        $produkdesa = ProdukDesa::whereNotNull('cardTitle')->latest()->get();
        $title = ProdukDesa::latest()->value('title');
        $background = ProdukDesa::latest()->value('background');
        $deskripsi = ProdukDesa::latest()->value('deskripsi');

        return view('admin.produkdesa.index', compact('produkdesa', 'title', 'deskripsi', 'background'));
    }

    public function editkonten()
    {
        $title = ProdukDesa::latest()->value('title');
        $produkdesa = ProdukDesa::latest()->first();
        $deskripsi = ProdukDesa::latest()->value('deskripsi');
        return view('admin.produkdesa.edit', compact('title', 'deskripsi', 'produkdesa'));
    }

    public function updatekonten(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'background' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'deskripsi' => 'nullable|string',
        ]);

        $backgroundPath = null;

        if ($request->hasFile('background')) {
            $filename = time() . '.' . $request->background->extension();
            $request->background->move(public_path('uploads/produkdesa'), $filename);
            $backgroundPath = 'uploads/produkdesa/' . $filename;
        }


        ProdukDesa::query()->update([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'background' => $backgroundPath,
        ]);

        return redirect()->route('produkdesa.index')->with('success', 'Tampilan berhasil diperbarui');
    }

    public function create()
    {
        $deskripsi = ProdukDesa::latest()->value('deskripsi');
        return view('admin.produkdesa.create', compact('deskripsi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'cardTitle' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $filename = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/produkdesa'), $filename);
            $gambarPath = 'uploads/produkdesa/' . $filename;
        }

        ProdukDesa::create([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'cardTitle' => $request->cardTitle,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('produkdesa.index')->with('success', 'produk desa berhasil ditambahkan');
    }

    public function edit(ProdukDesa $produkdesa)
    {
        $deskripsi = ProdukDesa::latest()->value('deskripsi');
        return view('admin.produkdesa.editproduk', compact('produkdesa', 'deskripsi'));
    }

    public function update(Request $request, ProdukDesa $produkdesa)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'cardTitle' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $filename = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/produkdesa'), $filename);
            $produkdesa->gambar = 'uploads/produkdesa/' . $filename;
        }

        $produkdesa->update([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'cardTitle' => $request->cardTitle,
            'gambar' => $produkdesa->gambar,
        ]);

        return redirect()->route('produkdesa.index')->with('success', 'produk desa berhasil diperbarui');
    }

    public function destroy(ProdukDesa $produkdesa)
    {
        $produkdesa->delete();
        return redirect()->route('produkdesa.index')->with('success', 'produk desa berhasil dihapus');
    }
}
