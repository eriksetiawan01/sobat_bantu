<?php

namespace App\Http\Controllers\PenyediaJasa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesanan;
use App\Models\LayananJasa;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.   
     */
    public function index()
    {
       // Mendapatkan ID penyedia jasa yang sedang login
       $penyediaJasa = Auth::user()->id;

       // Validasi role penyedia jasa
       if (Auth::user()->role !== 'penyedia_jasa') {
           abort(403, 'Unauthorized');
       }

       // Statistik utama
       $totalLayananJasa = LayananJasa::where('penyedia_jasa_id', $penyediaJasa)->count();
       $totalPesanan = Pesanan::where('penyedia_jasa_id', $penyediaJasa)->count();
       $totalLayananSelesai = Pesanan::where('penyedia_jasa_id', $penyediaJasa)
           ->where('status_pesanan', 'Selesai')
           ->count();

       // Pesanan terkini (5 terakhir)
       $pesananTerkini = Pesanan::where('penyedia_jasa_id', $penyediaJasa)
           ->latest('created_at')
           ->take(5)
           ->get();

       // Statistik bulanan untuk chart
       $monthlyStats = Pesanan::selectRaw("MONTH(created_at) as month, COUNT(*) as total")
           ->where('penyedia_jasa_id', $penyediaJasa)
           ->groupBy('month')
           ->orderBy('month')
           ->get()
           ->map(function ($item) {
               return [
                   'month' => date('F', mktime(0, 0, 0, $item->month, 10)), // Konversi bulan ke nama
                   'total' => $item->total,
               ];
           });

       // Kirim data ke view
       return view('penyediajasa.index', compact(
           'totalLayananJasa',
           'totalPesanan',
           'totalLayananSelesai',
           'pesananTerkini',
           'monthlyStats'
       ));
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
