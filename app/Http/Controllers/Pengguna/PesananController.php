<?php

namespace App\Http\Controllers\Pengguna;

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
        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Ambil data pesanan berdasarkan user_id pengguna yang login
        $pesanans = Pesanan::with('layananJasa')
            ->where('user_id', $user->id)
            ->get();

        return view('user.pesanan', compact('pesanans', 'user'));
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
        $user = Auth::user();

    // Cari pesanan berdasarkan ID dan user_id
    $pesanan = Pesanan::with('layananJasa')
        ->where('id', $id)
        ->where('user_id', $user->id)
        ->firstOrFail();

        return view('user.detail_pesanan', compact('pesanan'));
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
