<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;


// tamu
use App\Http\Controllers\Tamu\BerandaController as TamuBerandaController;
use App\Http\Controllers\Tamu\LayananJasaController as TamuLayananJasaController;

// Pengguna
use App\Http\Controllers\Pengguna\BerandaController as PenggunaBerandaController;
use App\Http\Controllers\Pengguna\LayananJasaController as PenggunaLayananJasaController;
use App\Http\Controllers\Pengguna\FormPemesananController as PenggunaFormPemesananController;
use App\Http\Controllers\Pengguna\PesananController as PenggunaPesananController;

// admin
use App\Http\Controllers\Admin\LayananJasaController as AdminLayananJasaController;
use App\Http\Controllers\Admin\KategoriController as AdminKategoriController;
use App\Http\Controllers\Admin\PenyediaJasaController as AdminPenyediaJasaController;
use App\Http\Controllers\Admin\PenggunaController as AdminPenggunaController;


// Penyedia Jasa
use App\Http\Controllers\PenyediaJasa\LayananJasaController as PenyediaJasaLayananJasaController;
use App\Http\Controllers\PenyediaJasa\PesananController as PenyediaPesananController;

Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::middleware('auth')->group(function () {
    // Route Pengguna
    Route::get('/user/index', function () {
        return view('user.index');
    })->name('user.index');
    Route::get('/', [PenggunaBerandaController::class, 'index'])->name('user.beranda');
    Route::get('/user/layanan', [PenggunaLayananJasaController::class, 'index'])->name('user.layanan');
    Route::get('/layanan/{id}', [PenggunaLayananJasaController::class, 'show'])->name('layanan.show');

    // Pemesanan
    Route::get('/form_pemesanan/{layanan_id}', [PenggunaFormPemesananController::class, 'index'])->name('form_pemesanan');
    Route::post('/form_pemesanan', [PenggunaFormPemesananController::class, 'store'])->name('form_pemesanan.store');
    Route::get('/user/pesanan', [PenggunaPesananController::class, 'index'])->name('user.pesanan');
    Route::get('/user/pesanan/{id}', [PenggunaPesananController::class, 'show'])->name('user.pesanan.show');


    


    // Route Role Admin
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.index');

    // route untuk data layanan jasa
    Route::get('/dashboard/layananjasa', [AdminLayananJasaController::class, 'index'])->name('admin.layananjasa.index'); // Menggunakan alias
    Route::get('/dashboard/layananjasa/create', [AdminLayananJasaController::class, 'create']); // Menggunakan alias
    Route::post('/dashboard/layananjasa', [AdminLayananJasaController::class, 'store'])->name('admin.layananjasa.store'); // Menyimpan layanan jasa baru
    Route::get('/dashboard/layananjasa/{id}', [AdminLayananJasaController::class, 'show'])->name('admin.layananjasa.show');
    Route::get('/dashboard/layananjasa/{id}/edit', [AdminLayananJasaController::class, 'edit']);
    Route::put('/dashboard/layananjasa/{id}', [AdminLayananJasaController::class, 'update'])->name('admin.layananjasa.update');
    Route::delete('/dashboard/layananjasa/{id}', [AdminLayananJasaController::class, 'destroy'])->name('admin.layananjasa.destroy');

    // route untuk data kategori
    Route::get('/dashboard/kategori', [AdminKategoriController::class, 'index'])->name('admin.kategori.index'); 
    Route::get('/dashboard/kategori/create', [AdminKategoriController::class, 'create']);
    Route::post('/dashboard/kategori/store', [AdminKategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('/dashboard/kategori/{id}', [AdminKategoriController::class, 'show'])->name('admin.kategori.show');
    Route::get('/dashboard/kategori/{id}/edit', [AdminKategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/dashboard/kategori/{id}', [AdminKategoriController::class, 'update'])->name('admin.kategori.update');
    Route::delete('/dashboard/kategori/{id}', [AdminKategoriController::class, 'destroy'])->name('admin.kategori.destroy');

    // route untuk data pengguna
    Route::get('/dashboard/pengguna', [AdminPenggunaController::class, 'index'])->name('admin.pengguna.index');
    Route::get('/dashboard/pengguna/create', [AdminPenggunaController::class, 'create'])->name('admin.pengguna.create');
    Route::post('/dashboard/pengguna/', [AdminPenggunaController::class, 'store'])->name('admin.pengguna.store');
    Route::get('/dashboard/pengguna/{id}', [AdminPenggunaController::class, 'show'])->name('admin.pengguna.show');
    Route::get('/dashboard/pengguna/{id}/edit', [AdminPenggunaController::class, 'edit'])->name('admin.pengguna.edit');
    Route::put('/dashboard/pengguna/{id}', [AdminPenggunaController::class, 'update'])->name('admin.pengguna.update');
    Route::delete('/dashboard/pengguna/{id}', [AdminPenggunaController::class, 'destroy'])->name('admin.pengguna.destroy');

    // route untuk data penyedia jasa
    Route::get('/dashboard/penyediajasa', [AdminPenyediaJasaController::class, 'index'])->name('admin.penyediajasa.index'); 
    Route::get('/dashboard/penyediajasa/create', [AdminPenyediaJasaController::class, 'create'])->name('admin.penyediajasa.create');
    Route::post('/dashboard/penyediajasa', [AdminPenyediaJasaController::class, 'store'])->name('admin.penyediajasa.store');
    Route::get('/dashboard/penyediajasa/{id}', [AdminPenyediaJasaController::class, 'show'])->name('admin.penyediajasa.show');
    Route::get('/dashboard/penyediajasa/{id}/edit', [AdminPenyediaJasaController::class, 'edit'])->name('admin.penyediajasa.edit');
    Route::put('/dashboard/penyediajasa/{id}', [AdminPenyediaJasaController::class, 'update'])->name('admin.penyediajasa.update');
    Route::delete('/dashboard/penyediajasa/{id}', [AdminPenyediaJasaController::class, 'destroy'])->name('admin.penyediajasa.destroy');

    // Route Penyedia Jasa
    Route::get('/penyediajasa/index', function () {
        return view('penyediajasa.index');
    })->name('penyediajasa.index');
    // Layanan Jasa
    Route::get('/penyediajasa/layananjasa', [PenyediaJasaLayananJasaController::class, 'index'])->name('penyediajasa.layananjasa.index');
        Route::get('/penyediajasa/{penyediaId}/layananjasa/create', [PenyediaJasaLayananJasaController::class, 'create'])->name('penyediajasa.layananjasa.create');
        Route::post('/penyediajasa/{id}/layananjasa', [PenyediaJasaLayananJasaController::class, 'store'])->name('penyediajasa.layananjasa.store');

    // Pesanan
    Route::get('/penyediajasa/pesanan', [PenyediaPesananController::class, 'index'])->name('penyediajasa.pesanan.index');


});


// Tamu
Route::get('/', [TamuBerandaController::class, 'index'])->name('tamu.beranda');
Route::get('/layanan', [TamuLayananJasaController::class, 'index'])->name('tamu.layanan');
Route::get('/layanan/{id}', [TamuLayananJasaController::class, 'show'])->name('layanan.show');
Route::get('/layanan/{layananId}/pesan', [TamuLayananJasaController::class, 'pesanLayanan'])->name('layanan.pesan');

// Route Dashboard Admin
// Route::get('/dashboard/layananjasa', [AdminLayananJasaController::class, 'index'])->name('admin.layananjasa.index'); // Menggunakan alias
// Route::get('/dashboard/layananjasa/create', [AdminLayananJasaController::class, 'create']); // Menggunakan alias
// Route::post('/dashboard/layananjasa', [AdminLayananJasaController::class, 'store'])->name('admin.layananjasa.store'); // Menyimpan layanan jasa baru
// Route::get('/dashboard/layananjasa/{id}', [AdminLayananJasaController::class, 'show'])->name('admin.layananjasa.show');
// Route::get('/dashboard/layananjasa/{id}/edit', [AdminLayananJasaController::class, 'edit']);
// Route::put('/dashboard/layananjasa/{id}', [AdminLayananJasaController::class, 'update'])->name('admin.layananjasa.update');
// Route::delete('/dashboard/layananjasa/{id}', [AdminLayananJasaController::class, 'destroy'])->name('admin.layananjasa.destroy');

// Route::get('/dashboard/kategori', [AdminKategoriController::class, 'index'])->name('admin.kategori.index'); 
// Route::get('/dashboard/kategori/create', [AdminKategoriController::class, 'create']);
// Route::post('/dashboard/kategori/store', [AdminKategoriController::class, 'store'])->name('admin.kategori.store');
// Route::get('/dashboard/kategori/{id}', [AdminKategoriController::class, 'show'])->name('admin.kategori.show');
// Route::get('/dashboard/kategori/{id}/edit', [AdminKategoriController::class, 'edit'])->name('admin.kategori.edit');
// Route::put('/dashboard/kategori/{id}', [AdminKategoriController::class, 'update'])->name('admin.kategori.update');
// Route::delete('/dashboard/kategori/{id}', [AdminKategoriController::class, 'destroy'])->name('admin.kategori.destroy');

// Route::get('/dashboard/penyediajasa', [AdminPenyediaJasaController::class, 'index'])->name('admin.penyediajasa.index'); 
// Route::get('/dashboard/penyediajasa/create', [AdminPenyediaJasaController::class, 'create'])->name('admin.penyediajasa.create');
// Route::post('/dashboard/penyediajasa', [AdminPenyediaJasaController::class, 'store'])->name('admin.penyediajasa.store');
// Route::get('/dashboard/penyediajasa/{id}', [AdminPenyediaJasaController::class, 'show'])->name('admin.penyediajasa.show');
// Route::get('/dashboard/penyediajasa/{id}/edit', [AdminPenyediaJasaController::class, 'edit'])->name('admin.penyediajasa.edit');
// Route::put('/dashboard/penyediajasa/{id}', [AdminPenyediaJasaController::class, 'update'])->name('admin.penyediajasa.update');
// Route::delete('/dashboard/penyediajasa/{id}', [AdminPenyediaJasaController::class, 'destroy'])->name('admin.penyediajasa.destroy');


// Route Dashboard Penyedia Jasa
// Route::get('/dashboard', function () {
//     return view('penyediajasa.index'); });
Route::get('/penyediajasa/{penyediaId}/layananjasa', [PenyediaJasaLayananJasaController::class, 'index'])->name('penyediajasa.layananjasa.index');

// Route::get('/dashboard', function () {
//     return view('admin.index'); });
// ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
