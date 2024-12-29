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
}
