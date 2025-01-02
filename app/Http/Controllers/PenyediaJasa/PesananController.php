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
