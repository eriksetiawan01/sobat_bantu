<?php

namespace App\Http\Controllers\PenyediaJasa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JenisPembayaran;

class JenisPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyediaJasa = Auth::user()->penyediaJasa;

    // Jika penyedia jasa tidak ditemukan (berarti bukan penyedia jasa)
    if (!$penyediaJasa) {
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }

    // Ambil data layanan jasa milik penyedia jasa
    $jenispembayarans = JenisPembayaran::where('penyedia_jasa_id', $penyediaJasa->id)->get();

    return view('penyediajasa.jenispembayaran.index', compact('jenispembayarans', 'penyediaJasa'));
    }

    public function create()
    {
        $penyediaJasa = Auth::user()->penyediaJasa;

        // Jika penyedia jasa tidak ditemukan (berarti bukan penyedia jasa)
        if (!$penyediaJasa) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        // Tampilkan form untuk menambahkan jenis pembayaran
        return view('penyediajasa.jenispembayaran.create', compact('penyediaJasa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_pembayaran' => 'required|string',
            'nomor' => 'required|string',
        ]);

        // Ambil data penyedia jasa yang sedang login
        $penyediaJasa = Auth::user()->penyediaJasa;

        // Simpan data jenis pembayaran
        JenisPembayaran::create([
            'penyedia_jasa_id' => $penyediaJasa->id,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'nomor' => $request->nomor,
        ]);

        // Redirect ke halaman index
        return redirect()->route('penyediajasa.jenispembayaran.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $penyediaJasa = Auth::user()->penyediaJasa;

        // Jika penyedia jasa tidak ditemukan (berarti bukan penyedia jasa)
        if (!$penyediaJasa) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        // Cari jenis pembayaran berdasarkan ID dan pastikan milik penyedia jasa yang sedang login
        $jenisPembayaran = JenisPembayaran::where('penyedia_jasa_id', $penyediaJasa->id)
            ->where('id', $id)
            ->firstOrFail();

        return view('penyediajasa.jenispembayaran.edit', compact('jenisPembayaran', 'penyediaJasa'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
    $request->validate([
        'jenis_pembayaran' => 'required|string',
        'nomor' => 'required|string',
    ]);

    // Ambil data penyedia jasa yang sedang login
    $penyediaJasa = Auth::user()->penyediaJasa;

    // Cari jenis pembayaran yang akan diupdate
    $jenisPembayaran = JenisPembayaran::where('penyedia_jasa_id', $penyediaJasa->id)
        ->where('id', $id)
        ->firstOrFail();

    // Update data jenis pembayaran
    $jenisPembayaran->update([
        'jenis_pembayaran' => $request->jenis_pembayaran,
        'nomor' => $request->nomor,
    ]);

    // Redirect ke halaman index
    return redirect()->route('penyediajasa.jenispembayaran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Ambil data penyedia jasa yang sedang login
    $penyediaJasa = Auth::user()->penyediaJasa;

    // Cari jenis pembayaran berdasarkan ID dan pastikan milik penyedia jasa yang sedang login
    $jenisPembayaran = JenisPembayaran::where('penyedia_jasa_id', $penyediaJasa->id)
        ->where('id', $id)
        ->firstOrFail();

    // Hapus jenis pembayaran
    $jenisPembayaran->delete();

    // Redirect ke halaman index
    return redirect()->route('penyediajasa.jenispembayaran.index');
    }
}
