<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = AboutUs::first();
        return view('admin.about.index', compact('about'));
    }

    public function edit()
    {
        $about = AboutUs::first();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'background' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'content' => 'nullable|string',
            'visi' => 'nullable|string|max:255',
            'visiContent' => 'nullable|string',
            'misi' => 'nullable|string|max:255',
            'misiContent' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $about = AboutUs::first() ?? new AboutUs();

        if ($request->hasFile('gambar')) {
            $filename = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/tentangkami'), $filename);
            $about->gambar = 'uploads/tentangkami/' . $filename;
        }

        if ($request->hasFile('background')) {
            $filename = time() . '.' . $request->background->extension();
            $request->background->move(public_path('uploads/tentangkami'), $filename);
            $about->background = 'uploads/tentangkami/' . $filename;
        }

        $about->title = $request->title;
        $about->content = $request->content;
        $about->visi = $request->visi;
        $about->visiContent = $request->visiContent;
        $about->misi = $request->misi;

        if ($request->filled('misiContent')) {
            // pecah berdasarkan koma
            $items = explode(',', $request->misiContent);

            // trim spasi dan kutip
            $items = array_map(function ($item) {
                return trim($item, " \t\n\r\0\x0B\"'");
            }, $items);

            // filter kosong
            $about->misiContent = json_encode(array_filter($items));
        } else {
            $about->misiContent = json_encode([]);
        }

        $about->save();

        return redirect()->route('about.index')->with('success', 'Data berhasil diperbarui');
    }
}
