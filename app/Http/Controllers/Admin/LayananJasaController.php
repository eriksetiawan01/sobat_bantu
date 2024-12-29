<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananJasa;
use App\Models\Kategori;
use App\Models\PenyediaJasa;
use Illuminate\Support\Facades\Storage;

class LayananJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanans = LayananJasa::all();
        return view('admin.layananjasa.index', compact('layanans'));
    }

    // Menampilkan form untuk menambah layanan jasa
    public function create()
    {
        // Mengambil data penyedia jasa dan kategori untuk dropdown
        $penyediaJasa = PenyediaJasa::all();
        $kategori = Kategori::all();
        
        return view('admin.layananjasa.create', compact('penyediaJasa', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
    $validated = $request->validate([
        'penyedia_jasa_id' => 'required|exists:penyedia_jasa,id', // Pastikan penyedia_jasa_id ada di tabel penyedia_jasa
        'namaJasa' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'harga' => 'required|numeric',
        'kategori_id' => 'required|exists:kategori,id', // Pastikan kategori_id ada di tabel kategori
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Menyimpan data layanan jasa baru
    $layananJasa = new LayananJasa();
    $layananJasa->penyedia_jasa_id = $validated['penyedia_jasa_id']; // Menambahkan penyedia_jasa_id
    $layananJasa->namaJasa = $validated['namaJasa'];
    $layananJasa->deskripsi = $validated['deskripsi'];
    $layananJasa->harga = $validated['harga'];
    $layananJasa->kategori_id = $validated['kategori_id'];

    // Menyimpan gambar jika ada
    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('images/layanan_jasa', 'public');
        $layananJasa->gambar = $path;
    }

    $layananJasa->save();

    // Redirect atau beri feedback setelah data disimpan
    return redirect()->route('admin.layananjasa.index')->with('success', 'Layanan jasa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         // Ambil data layanan jasa berdasarkan ID
    $layananJasa = LayananJasa::findOrFail($id);

    // Tampilkan halaman show dengan data layanan jasa
    return view('admin.layananjasa.show', compact('layananJasa'));
    }

    public function edit(string $id)
{
    // Ambil data layanan jasa berdasarkan ID
    $layanan = LayananJasa::findOrFail($id);

    // Ambil data penyedia jasa dan kategori untuk dropdown
    $penyediaJasa = PenyediaJasa::all();
    $kategori = Kategori::all();

    return view('admin.layananjasa.edit', compact('layanan', 'penyediaJasa', 'kategori'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validasi data yang diterima
    $validated = $request->validate([
        'penyedia_jasa_id' => 'required|exists:penyedia_jasa,id',
        'namaJasa' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'harga' => 'required|numeric',
        'kategori_id' => 'required|exists:kategori,id',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Temukan layanan jasa berdasarkan ID
    $layananJasa = LayananJasa::findOrFail($id);
    
    // Update data layanan jasa
    $layananJasa->penyedia_jasa_id = $validated['penyedia_jasa_id'];
    $layananJasa->namaJasa = $validated['namaJasa'];
    $layananJasa->deskripsi = $validated['deskripsi'];
    $layananJasa->harga = $validated['harga'];
    $layananJasa->kategori_id = $validated['kategori_id'];

    // Update gambar jika ada
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($layananJasa->gambar) {
            Storage::delete('public/' . $layananJasa->gambar);
        }
        $path = $request->file('gambar')->store('images/layanan_jasa', 'public');
        $layananJasa->gambar = $path;
    }

    $layananJasa->save();

    // Redirect atau beri feedback setelah data diperbarui
    return redirect()->route('admin.layananjasa.index')->with('success', 'Layanan jasa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari layanan jasa berdasarkan ID
    $layananJasa = LayananJasa::findOrFail($id);

    // Hapus gambar jika ada
    if ($layananJasa->gambar) {
        // Hapus gambar dari storage
        Storage::disk('public')->delete($layananJasa->gambar);
    }

    // Hapus data layanan jasa
    $layananJasa->delete();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('admin.layananjasa.index')->with('success', 'Layanan jasa berhasil dihapus.');
    }
}
