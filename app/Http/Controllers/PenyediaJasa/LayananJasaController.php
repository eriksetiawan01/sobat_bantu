<?php

namespace App\Http\Controllers\PenyediaJasa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenyediaJasa;
use App\Models\LayananJasa;

class LayananJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($penyediaId)
    {
        // Ambil penyedia jasa berdasarkan ID
        $penyediaJasa = PenyediaJasa::findOrFail($penyediaId);

        // Ambil layanan yang dimiliki oleh penyedia jasa
        $layanans = LayananJasa::where('penyedia_jasa_id', $penyediaJasa->id)->get();

        return view('penyediajasa.layananjasa.index', compact('layanans', 'penyediaJasa'));
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
