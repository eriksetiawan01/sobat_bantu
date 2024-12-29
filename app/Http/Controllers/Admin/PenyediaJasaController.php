<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PenyediaJasa;
use Illuminate\Http\Request;

class PenyediaJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyedias = PenyediaJasa::all();
        return view('admin.penyediajasa.index', compact('penyedias'));
    }

    public function create()
    {
        return view('admin.penyediajasa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'noTelepon' => 'required|string|max:15',
        'email' => 'required|email|unique:penyedia_jasa,email',
    ]);

    // Simpan data ke database
    PenyediaJasa::create([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'noTelepon' => $request->noTelepon,
        'email' => $request->email,
    ]);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('admin.penyediajasa.index')->with('success', 'Penyedia Jasa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penyedia = PenyediaJasa::findOrFail($id);
        return view('admin.penyediajasa.show', compact('penyedia'));
    }

    public function edit(string $id)
    {
        $penyedia = PenyediaJasa::findOrFail($id);
        return view('admin.penyediajasa.edit', compact('penyedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'noTelepon' => 'required|string|max:15',
            'email' => 'required|email|unique:penyedia_jasa,email,' . $id,
        ]);

        // Temukan data yang akan diupdate
        $penyedia = PenyediaJasa::findOrFail($id);
        $penyedia->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'noTelepon' => $request->noTelepon,
            'email' => $request->email,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.penyediajasa.index')->with('success', 'Penyedia Jasa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan dan hapus penyedia jasa
        $penyedia = PenyediaJasa::findOrFail($id);
        $penyedia->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.penyediajasa.index')->with('success', 'Penyedia Jasa berhasil dihapus.');
    }
}
