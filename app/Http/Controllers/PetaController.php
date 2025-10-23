<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peta;

class PetaController extends Controller
{
    public function index()
    {
        $all = Peta::latest()->get();

        $latest = $all->first();
        $peta   = $all->skip(1);

        $title = $latest?->title;
        $background = $latest?->background;

        return view('admin.peta.index', compact('peta', 'title', 'background'));
    }


    public function editkonten()
    {
        $title = Peta::latest()->value('title');
        $peta = Peta::latest()->first();
        return view('admin.peta.edit', compact('title', 'peta'));
    }

    public function updatekonten(Request $request)
    {
        try {
            $request->validate([
                'title' => 'nullable|string|max:255',
                'background' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            ]);

            $backgroundPath = null;

            if ($request->hasFile('background')) {
                $filename = time() . '.' . $request->background->extension();
                $request->background->move(public_path('uploads/peta'), $filename);
                $backgroundPath = 'uploads/peta/' . $filename;
            }

            Peta::query()->update([
                'title' => $request->title,
                'background' => $backgroundPath,
            ]);
            return redirect()->route('peta.index')->with('success', 'Tampilan berhasil diperbarui');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('admin.peta.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'nullable|string|max:255',
                'gambar' => 'required|image|mimes:jpg,jpeg,png|max:10240',
            ]);

            $gambarPath = null;
            if ($request->hasFile('gambar')) {
                $filename = time() . '.' . $request->gambar->extension();
                $request->gambar->move(public_path('uploads/peta'), $filename);
                $gambarPath = 'uploads/peta/' . $filename;
            }

            Peta::create([
                'title' => $request->title,
                'gambar' => $gambarPath,
            ]);
            return redirect()->route('peta.index')->with('success', 'peta berhasil ditambahkan');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit(peta $peta)
    {
        return view('admin.peta.editpeta', compact('peta'));
    }

    public function update(Request $request, peta $peta)
    {
        try {
            $request->validate([
                'title' => 'nullable|string|max:255',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            ]);

            if ($request->hasFile('gambar')) {
                $filename = time() . '.' . $request->gambar->extension();
                $request->gambar->move(public_path('uploads/peta'), $filename);
                $peta->gambar = 'uploads/peta/' . $filename;
            }

            $peta->update([
                'title' => $request->title,
                'gambar' => $peta->gambar,
            ]);
            return redirect()->route('peta.index')->with('success', 'peta berhasil diperbarui');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(peta $peta)
    {
        try {
            $peta->delete();
            return redirect()->route('peta.index')->with('success', 'peta berhasil dihapus');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
