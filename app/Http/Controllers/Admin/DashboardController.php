<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PenyediaJasa;
use App\Models\LayananJasa;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // Mengambil total pengguna dengan role 'user'
    $totalPengguna = User::where('role', 'pengguna')->count();

    // Mengambil total penyedia jasa
    $totalPenyediaJasa = PenyediaJasa::count();

    // Mengambil total layanan jasa
    $totalLayananJasa = LayananJasa::count();

    // Mengambil total pesanan
    $totalPesanan = Pesanan::count();

    $year = $request->input('year', now()->year); // Ambil tahun dari request atau default ke tahun sekarang

    // Statistik total
    $totalPengguna = User::where('role', 'pengguna')->count();
    $totalPenyediaJasa = PenyediaJasa::count();
    $totalLayananJasa = LayananJasa::count();
    $totalPesanan = Pesanan::count();

    // Data statistik pesanan per bulan berdasarkan waktu_pemesanan
    $rawStats = DB::table('pesanan')
    ->select(DB::raw('MONTH(waktu_pemesanan) as month'), DB::raw('COUNT(*) as total'))
    ->whereYear('waktu_pemesanan', $year)
    ->groupBy(DB::raw('MONTH(waktu_pemesanan)'))
    ->get();

    // Isi data bulan yang kosong dengan total = 0
    $monthlyStats = collect(range(1, 12))->map(function ($month) use ($rawStats) {
    return [
        'month' => $month,
        'total' => $rawStats->firstWhere('month', $month)->total ?? 0,
    ];
    });

    return view('admin.index', compact(
        'totalPengguna',
        'totalPenyediaJasa',
        'totalLayananJasa',
        'totalPesanan',
        'monthlyStats',
        'year'
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
