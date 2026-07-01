<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meja extends Model
{
    use HasFactory;

    /**
     * Nama tabel
     */
    protected $table = 'mejas';

    /**
     * Mass Assignment
     */
    protected $fillable = [

        'nomor_meja',

        'kapasitas',

        'status',

        'jumlah_kursi',

        'lokasi',

    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi Pesanan
    |--------------------------------------------------------------------------
    */

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}