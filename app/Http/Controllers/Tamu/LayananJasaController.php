<?php

namespace App\Http\Controllers\Tamu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\LayananJasa;

class LayananJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan = LayananJasa::with('kategori')->get();
        return view('tamu.layanan', compact('layanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function pesanLayanan($layananId)
    {
        if (!session('user_id')) {  // Ganti dengan pengecekan status login yang sesuai dengan aplikasi Anda
            // Menambahkan pesan ke session untuk ditampilkan di view
            return redirect()->route('tamu.layanan')->with('error', 'Kamu gabisa memesan layanan jasa karena kamu belum login, silahkan login terlebih dahulu');
        }

        // Lanjutkan dengan logika pemesanan layanan jika sudah login
        // Misalnya, redirect ke halaman pemesanan
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $layanan = LayananJasa::with(['kategori', 'penyediaJasa'])->findOrFail($id);
        return view('tamu.detail_layanan', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
