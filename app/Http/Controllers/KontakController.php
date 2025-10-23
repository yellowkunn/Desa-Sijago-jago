<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;

class KontakController extends Controller
{
    public function index()
    {
        $title = Kontak::latest()->value('title');
        $kontak = Kontak::latest()->first();
        return view('admin.kontak.index', compact('kontak', 'title'));
    }

    public function edit()
    {
        $kontak = Kontak::latest()->first();
        return view('admin.kontak.edit', compact('kontak'));
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'title' => 'nullable|string|max:255',
                'background' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
                'lokasi' => 'nullable|string',
                'email' => 'nullable|string|email',
                'whatsapp' => 'nullable|string',
                'maps' => 'nullable|string',
            ]);

            $kontak = Kontak::latest()->first();

            if ($request->hasFile('background')) {
                $filename = time() . '.' . $request->background->extension();
                $request->background->move(public_path('uploads'), $filename);
                $kontak->background = 'uploads/' . $filename;
                $kontak->save();
            }

            if ($kontak) {
                $kontak->update([
                    'title' => $request->title,
                    'lokasi' => $request->lokasi,
                    'email' => $request->email,
                    'whatsapp' => $request->whatsapp,
                    'maps' => $request->maps,
                ]);
            } else {
                // kalau belum ada data, buat baru
                Kontak::create([
                    'title' => $request->title,
                    'lokasi' => $request->lokasi,
                    'email' => $request->email,
                    'whatsapp' => $request->whatsapp,
                    'maps' => $request->maps,
                ]);
            }

            return redirect()->route('kontak.index')->with('success', 'Informasi kontak berhasil diperbarui');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
