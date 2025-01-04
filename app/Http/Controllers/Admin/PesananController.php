<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;


class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data pesanan beserta relasi terkait
    $pesanans = Pesanan::with(['user', 'layananJasa', 'jenisPembayaran', 'penyediaJasa'])->get();

    // Mengirim data ke view
    return view('admin.pesanan.index', compact('pesanans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mengambil data pesanan berdasarkan ID beserta relasi yang diperlukan
    $pesanan = Pesanan::with(['user', 'layananJasa', 'jenisPembayaran', 'penyediaJasa'])->findOrFail($id);

    // Mengirim data pesanan ke view
    return view('admin.pesanan.show', compact('pesanan'));
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
