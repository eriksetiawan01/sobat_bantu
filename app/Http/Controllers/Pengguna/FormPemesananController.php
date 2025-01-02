<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananJasa;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;



class FormPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($layanan_id)
    {
        // Mendapatkan data layanan berdasarkan ID
        $layanan = LayananJasa::findOrFail($layanan_id);
        return view('user.form_pemesanan', compact('layanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());  // Melihat seluruh data yang dikirimkan form

        // Validasi data
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'detail_pekerjaan' => 'required|string',
        'no_telepon' => 'required|string|max:15',
        'waktu_pemesanan' => 'required|date',
        'jam_pemesanan' => 'required|date_format:H:i',
        'harga' => 'required|numeric',
        'layanan_jasa_id' => 'required|exists:layanan_jasa,id',
        'penyedia_jasa_id' => 'required|exists:penyedia_jasa,id',
    ]);

    // Menyimpan pesanan
    Pesanan::create([
        'user_id' => Auth::id(),
        'layanan_jasa_id' => $request->layanan_jasa_id,
        'penyedia_jasa_id' => $request->penyedia_jasa_id,
        'nama_lengkap' => $request->nama_lengkap,
        'alamat' => $request->alamat,
        'no_telepon' => $request->no_telepon,
        'waktu_pemesanan' => $request->waktu_pemesanan,
        'jam_pemesanan' => $request->jam_pemesanan,
        'detail_pekerjaan' => $request->detail_pekerjaan,
        'harga' => $request->harga,
        'status_pembayaran' => 'Belum dibayar',
        'status_pesanan' => 'Belum diproses',
    ]);

    // Redirect atau tampilkan pesan sukses
    return redirect()->route('user.layanan')->with('success', 'Pesanan Anda telah dibuat.');
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
