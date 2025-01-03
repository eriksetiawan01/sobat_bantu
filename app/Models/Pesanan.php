<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'user_id', 'layanan_jasa_id', 'penyedia_jasa_id', 'nama_lengkap', 
        'alamat', 'no_telepon', 'waktu_pemesanan', 'jam_pemesanan', 
        'detail_pekerjaan', 'harga', 'metode_pembayaran_id', 'status_pembayaran', 'status_pesanan', 'ulasan', 'bukti_pembayaran'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function layananJasa()
    {
        return $this->belongsTo(LayananJasa::class, 'layanan_jasa_id');
    }

    public function penyediaJasa()
    {
        return $this->belongsTo(User::class, 'penyedia_jasa_id');
    }

    // Relasi ke jenis pembayaran berdasarkan penyedia jasa
    public function jenisPembayaran()
    {
        return $this->belongsTo(JenisPembayaran::class,  'metode_pembayaran_id');
    }
}
