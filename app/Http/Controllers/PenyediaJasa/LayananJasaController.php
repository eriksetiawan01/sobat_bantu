<?php

namespace App\Http\Controllers\PenyediaJasa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenyediaJasa;
use App\Models\LayananJasa;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class LayananJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($penyediaId)
    {
        // Ambil penyedia jasa yang sedang login
    $penyediaJasa = Auth::user()->penyediaJasa;

    // Jika penyedia jasa tidak ditemukan (berarti bukan penyedia jasa)
    if (!$penyediaJasa) {
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }

    // Ambil data layanan jasa milik penyedia jasa
    $layanans = LayananJasa::where('penyedia_jasa_id', $penyediaJasa->id)->get();

    return view('penyediajasa.layananjasa.index', compact('layanans', 'penyediaJasa'));
    }

    /**
     * Menampilkan halaman form tambah layanan jasa.
     */
    public function create($penyediaId)
    {
        // Ambil penyedia jasa berdasarkan ID
        $penyediaJasa = PenyediaJasa::findOrFail($penyediaId);

        // Ambil semua kategori layanan
        $kategoris = Kategori::all();

        return view('penyediajasa.layananjasa.create', compact('penyediaJasa', 'kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'namaJasa' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'kategori_id' => 'required|exists:kategori,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil penyedia jasa yang sedang login
        $penyediaJasa = Auth::user()->penyediaJasa;

        // Proses upload gambar (jika ada)
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('layanan_jasa', 'public');
        }

        // Simpan layanan jasa baru
        LayananJasa::create([
            'penyedia_jasa_id' => $penyediaJasa->id,
            'namaJasa' => $request->namaJasa,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id,
            'gambar' => $gambarPath ?? null,
        ]);

        // Redirect ke halaman index layanan jasa
        return redirect()->route('penyediajasa.layananjasa.index', $penyediaJasa->id)
                         ->with('success', 'Layanan Jasa berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Ambil penyedia jasa yang sedang login
    $penyediaJasa = Auth::user()->penyediaJasa;

    // Pastikan penyedia jasa yang login memiliki layanan jasa dengan ID tersebut
    $layananJasa = LayananJasa::where('penyedia_jasa_id', $penyediaJasa->id)
                               ->findOrFail($id);

    // Tampilkan halaman show dengan data layanan jasa
    return view('penyediajasa.layananjasa.show', compact('layananJasa', 'penyediaJasa'));
    }

    public function edit(string $id)
    {
        // Ambil penyedia jasa yang sedang login
        $penyediaJasa = Auth::user()->penyediaJasa;

        // Pastikan penyedia jasa yang login memiliki layanan jasa dengan ID tersebut
        $layananJasa = LayananJasa::where('penyedia_jasa_id', $penyediaJasa->id)
                                ->findOrFail($id);

        // Ambil semua kategori untuk dropdown
        $kategoris = Kategori::all();

        return view('penyediajasa.layananjasa.edit', compact('layananJasa', 'penyediaJasa', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
    $request->validate([
        'namaJasa' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'harga' => 'required|numeric',
        'kategori_id' => 'required|exists:kategori,id',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Ambil penyedia jasa yang sedang login
    $penyediaJasa = Auth::user()->penyediaJasa;

    // Ambil data layanan jasa yang ingin diubah
    $layananJasa = LayananJasa::where('penyedia_jasa_id', $penyediaJasa->id)
                               ->findOrFail($id);

    // Proses upload gambar (jika ada)
    if ($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('layanan_jasa', 'public');
        $layananJasa->gambar = $gambarPath;
    }

    // Update layanan jasa
    $layananJasa->update([
        'namaJasa' => $request->namaJasa,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'kategori_id' => $request->kategori_id,
    ]);

    // Redirect ke halaman index layanan jasa
    return redirect()->route('penyediajasa.layananjasa.index', ['penyediaId' => $penyediaJasa->id])
                     ->with('success', 'Layanan Jasa berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Ambil penyedia jasa yang sedang login
    $penyediaJasa = Auth::user()->penyediaJasa;

    // Pastikan penyedia jasa yang login memiliki layanan jasa dengan ID tersebut
    $layananJasa = LayananJasa::where('penyedia_jasa_id', $penyediaJasa->id)
                               ->findOrFail($id);

    // Hapus layanan jasa
    $layananJasa->delete();

    // Redirect ke halaman index layanan jasa
    return redirect()->route('penyediajasa.layananjasa.index', ['penyediaId' => $penyediaJasa->id])
                     ->with('success', 'Layanan Jasa berhasil dihapus!');
    }
}