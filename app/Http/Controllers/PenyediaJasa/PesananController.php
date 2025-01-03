<?php

namespace App\Http\Controllers\PenyediaJasa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;



class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil penyedia jasa yang sedang login
    $penyediaJasa = Auth::user()->penyediaJasa;

    // Jika penyedia jasa tidak ditemukan (berarti bukan penyedia jasa)
    if (!$penyediaJasa) {
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }

    // Ambil data layanan jasa milik penyedia jasa
    $pesanans = Pesanan::with('layananJasa')->where('penyedia_jasa_id', $penyediaJasa->id)->get();
    

    return view('penyediajasa.pesanan.index', compact('pesanans', 'penyediaJasa'));
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
        // Ambil pesanan berdasarkan ID dan hubungkan dengan relasi yang relevan
    $pesanan = Pesanan::with('user', 'layananJasa')->findOrFail($id);

    // Pastikan pesanan tersebut milik penyedia jasa yang sedang login
    $penyediaJasa = Auth::user()->penyediaJasa;
    if ($pesanan->penyedia_jasa_id !== $penyediaJasa->id) {
        abort(403, 'Anda tidak memiliki akses ke pesanan ini.');
    }

    return view('penyediajasa.pesanan.show', compact('pesanan'));
    }

    public function edit($id)
    {
        // Cari pesanan berdasarkan ID
        $pesanan = Pesanan::findOrFail($id);

        // Pastikan pesanan milik penyedia jasa yang sedang login
        $penyediaJasa = Auth::user()->penyediaJasa;
        if ($pesanan->penyedia_jasa_id !== $penyediaJasa->id) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit pesanan ini.');
        }

        return view('penyediajasa.pesanan.edit', compact('pesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
    $validated = $request->validate([
        'status_pesanan' => 'required|string|max:255',
        'status_pembayaran' => 'required|string|max:255',
    ]);

    // Cari pesanan berdasarkan ID
    $pesanan = Pesanan::findOrFail($id);

    // Pastikan pesanan milik penyedia jasa yang sedang login
    $penyediaJasa = Auth::user()->penyediaJasa;
    if ($pesanan->penyedia_jasa_id !== $penyediaJasa->id) {
        abort(403, 'Anda tidak memiliki akses untuk mengedit pesanan ini.');
    }

    // Update data pesanan
    $pesanan->update($validated);

    return redirect()->route('penyediajasa.pesanan.index')
        ->with('success', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
