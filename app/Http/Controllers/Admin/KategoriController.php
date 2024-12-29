<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));   
    }

    // Menampilkan form untuk menambah layanan jasa
    public function create()
    { 
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi form input
        $validated = $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string'
        ]);

        Kategori::create($validated);
        return redirect()->route('admin.kategori.index')->with('pesan', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Ambil data layanan jasa berdasarkan ID
    $kategori = Kategori::findOrFail($id);

    // Tampilkan halaman show dengan data layanan jasa
    return view('admin.kategori.show', compact('kategori'));
    }

    public function edit($id)
    {
        // Retrieve the kategori record by ID
        $kategori = Kategori::findOrFail($id);
        
        // Return the edit view with the kategori data
        return view('admin.kategori.edit', compact('kategori'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the input data
        $validated = $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        // Find the kategori and update the data
        $kategori = Kategori::findOrFail($id);
        $kategori->update($validated);

        // Redirect with a success message
        return redirect()->route('admin.kategori.index')->with('pesan', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Retrieve the kategori by ID
    $kategori = Kategori::findOrFail($id);

    // Delete the kategori record
    $kategori->delete();

    // Redirect to the index page with a success message
    return redirect()->route('admin.kategori.index')->with('pesan', 'Kategori berhasil dihapus.');
    }
}
