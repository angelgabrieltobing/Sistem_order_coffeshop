<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meja extends Model
{
    use HasFactory;

    protected $table = 'mejas';

    protected $fillable = [
        'nomor_meja',
        'kapasitas',
        'status', // tersedia, terisi, reservasi
        'qr_code',
        'lokasi',
        'aktif',
    ];

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}