<?php

namespace App\Http\Controllers\Tamu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananJasa;


class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil 4 layanan yang paling sering dipesan
        $layananFavorit = LayananJasa::withCount('pesanan')  // Menghitung jumlah pesanan pada setiap layanan
                                      ->orderBy('pesanan_count', 'desc')  // Urutkan berdasarkan jumlah pesanan
                                      ->take(4)  // Ambil 4 layanan teratas
                                      ->get();

        return view('tamu.index', compact('layananFavorit'));
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
        //
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
