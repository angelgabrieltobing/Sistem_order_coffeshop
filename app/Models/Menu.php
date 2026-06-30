<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model

{
    protected $table = 'menus';

    protected $fillable = [

        'nama',

        'kategori',

        'harga',

        'deskripsi',

        
        'gambar',

        'status',

        
    ];
    public function itemPesanans()
{
    return $this->hasMany(ItemPesanan::class);
}

}