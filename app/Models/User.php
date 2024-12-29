<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'no_telepon',
        'email',
        'birthday',
        'gender',
        'alamat',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function penyediaJasa()
    {
        return $this->belongsTo(PenyediaJasa::class, 'penyedia_jasa_id');
    }
    public function layananJasa()
    {
        return $this->hasMany(LayananJasa::class, 'penyediajasa_id');
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'user_id');
    }

    // public function transaksi()
    // {
    //     return $this->hasMany(Transaksi::class, 'pengguna_id');
    // }
}
