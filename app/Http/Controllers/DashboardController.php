<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\DestinasiWisata;
use App\Models\PaketWisata;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Dashboard::where('section', 'hero')->first();
        $tentang = Dashboard::where('section', 'tentang')->first();
        $destinasi = Dashboard::where('section', 'destinasi')->first();
        $paket = Dashboard::where('section', 'paket')->first();

        $wisataRow1 = DestinasiWisata::whereNotNull('cardTitle')->latest()->take(3)->get();
        $wisataRow2 = DestinasiWisata::latest()->skip(3)->take(1)->first();
        $paketwisata = PaketWisata::latest()->skip(1)->take(4)->get();

        return view('admin.dashboard.index', compact(
            'hero',
            'tentang',
            'destinasi',
            'paket',
            'wisataRow1',
            'wisataRow2',
            'paketwisata'
        ));
    }


    public function edit(Dashboard $dashboard)
    {
        return view('admin.dashboard.edit', compact('dashboard'));
    }

    public function update(Request $request, Dashboard $dashboard)
    {
        $request->validate([
            'title1' => 'nullable|string|max:255',
            'title2' => 'nullable|string|max:255',
            'konten' => 'nullable|string',
            'background' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle upload background
        if ($request->hasFile('background')) {
            $filename = time() . '.' . $request->background->extension();
            $request->background->move(public_path('uploads/dashboard'), $filename);
            $dashboard->background = 'uploads/dashboard/' . $filename;
        }

        $dashboard->update([
            'title1' => $request->title1,
            'title2' => $request->title2,
            'konten' => $request->konten,
            'background' => $dashboard->background,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Section berhasil diperbarui');
    }
}
