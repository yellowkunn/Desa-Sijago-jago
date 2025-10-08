<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinasiWisataController;
use App\Http\Controllers\ProdukDesaController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\PaketWisata2Controller;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes (Frontend)
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/tentang-kami', [PageController::class, 'tentangKami'])->name('tentang.kami');
Route::get('/destinasi-wisata', [PageController::class, 'destinasiWisata'])->name('destinasi.wisata');
Route::get('/produk-desa', [PageController::class, 'produkDesa'])->name('produk.desa');
Route::get('/paket-wisata', [PageController::class, 'paketWisata'])->name('paket.wisata');
Route::get('/peta', [PageController::class, 'peta'])->name('peta');
Route::get('/informasi-kontak', [PageController::class, 'informasiKontak'])->name('kontak');


//login
Route::get('/loginadmin', [LoginController::class, 'index'])->name('login');
Route::post('/loginadmin', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/{dashboard}/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/{dashboard}', [DashboardController::class, 'update'])->name('dashboard.update');

    // Tentang Kami
    Route::get('/tentang-kami', [AboutUsController::class, 'index'])->name('about.index');
    Route::get('/tentang-kami/edit', [AboutUsController::class, 'edit'])->name('about.edit');
    Route::post('/tentang-kami/update', [AboutUsController::class, 'update'])->name('about.update');

    // Destinasi Wisata
    Route::resource('wisata-admin', DestinasiWisataController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
        ->parameters(['wisata-admin' => 'wisatum'])
        ->names('wisata');
    Route::get('/wisata-admin/editwisata', [DestinasiWisataController::class, 'editwisata'])->name('wisata.editwisata');
    Route::post('/wisata-admin/updatewisata', [DestinasiWisataController::class, 'updatewisata'])->name('wisata.updatewisata');

    // Produk Desa
    Route::resource('produk-desa-admin', ProdukDesaController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
        ->parameters(['produk-desa-admin' => 'produkdesa'])
        ->names('produkdesa');
    Route::get('/produk-desa-admin/editkonten', [ProdukDesaController::class, 'editkonten'])->name('produkdesa.editkonten');
    Route::post('/produk-desa-admin/updatekonten', [ProdukDesaController::class, 'updatekonten'])->name('produkdesa.updatekonten');

    // Paket Wisata
    Route::resource('paket-wisata-admin', PaketWisataController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
        ->parameters(['paket-wisata-admin' => 'paketwisata'])
        ->names('paketwisata');

    Route::get('/paket-wisata-admin/editkonten', [PaketWisataController::class, 'editkonten'])->name('paketwisata.editkonten');
    Route::post('/paket-wisata-admin/updatekonten', [PaketWisataController::class, 'updatekonten'])->name('paketwisata.updatekonten');

    // Paket Wisata2
    Route::resource('paket-wisata-admin2', PaketWisata2Controller::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
        ->names('paketwisata2');


    // Peta
    Route::resource('peta-admin', PetaController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
        ->parameters(['peta-admin' => 'peta'])
        ->names('peta');

    Route::get('/peta-admin/editkonten', [PetaController::class, 'editkonten'])->name('peta.editkonten');
    Route::post('/peta-admin/updatekonten', [PetaController::class, 'updatekonten'])->name('peta.updatekonten');

    // Kontak
    Route::get('/kontak-admin', [KontakController::class, 'index'])->name('kontak.index');
    Route::get('/kontak-admin/edit', [KontakController::class, 'edit'])->name('kontak.edit');
    Route::put('/kontak-admin/update', [KontakController::class, 'update'])->name('kontak.update');
});
