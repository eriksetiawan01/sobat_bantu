<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class JenisPembayaran extends Model
{
    use HasFactory;

    protected $table = 'jenis_pembayaran';

    protected $fillable = [
        'penyedia_jasa_id',
        'jenis_pembayaran',
        'nomor',
    ];

    // Relasi dengan PenyediaJasa
    public function penyediaJasa()
    {
        return $this->belongsTo(PenyediaJasa::class); // Relasi belongsTo dengan PenyediaJasa
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
