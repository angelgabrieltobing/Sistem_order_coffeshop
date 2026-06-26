<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'kategori_id',
        'gambar',
        'aktif',
        'sku',
        'berat',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function itemPesanans()
    {
        return $this->hasMany(ItemPesanan::class);
    }
}