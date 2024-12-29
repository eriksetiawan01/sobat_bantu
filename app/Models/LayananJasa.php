<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LayananJasa extends Model
{
    use HasFactory;

    protected $table = 'layanan_jasa';

    protected $fillable = [
        'penyedia_jasa_id',
        'namaJasa',
        'deskripsi',
        'harga',
        'kategori_id',
        'gambar',
    ];

    public function penyediaJasa()
    {
        return $this->belongsTo(PenyediaJasa::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
