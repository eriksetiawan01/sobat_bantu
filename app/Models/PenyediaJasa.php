<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenyediaJasa extends Model
{
    use HasFactory;

    protected $table = 'penyedia_jasa';

    protected $fillable = [
        'nama',
        'alamat',
        'noTelepon',
        'email',
    ];

    public function layananJasa()
    {
        return $this->hasMany(LayananJasa::class);
    }

    public function jenisPembayaran()
    {
        return $this->hasMany(JenisPembayaran::class); // Relasi hasMany dengan JenisPembayaran
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
