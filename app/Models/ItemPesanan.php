<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPesanan extends Model
{
    use HasFactory;

    protected $table = 'item_pesanans';

protected $fillable = [
    'pesanan_id',
    'menu_id',
    'qty',
    'harga',
    'subtotal',
    'catatan',
];

    protected $casts = [
        'harga' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}