<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\LayananJasa;

class LayananJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil semua kategori
    $kategoris = Kategori::all(); 
    
    // Jika ada kategori yang dipilih, filter layanan berdasarkan kategori
    if ($request->has('kategori_id')) {
        $layanan = LayananJasa::where('kategori_id', $request->kategori_id)->get();
    } else {
        $layanan = LayananJasa::all();
    }

    return view('user.layanan', compact('layanan', 'kategoris'));
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
        $layanan = LayananJasa::with(['kategori', 'penyediaJasa'])->findOrFail($id);
        return view('user.detail_layanan', compact('layanan'));
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
