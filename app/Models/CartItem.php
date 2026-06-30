<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';

    protected $fillable = [

        'cart_id',

        'menu_id',

        'qty',

        'harga',

        'subtotal',

    ];

    protected $casts = [

        'harga' => 'decimal:2',

        'subtotal' => 'decimal:2',

    ];

    /*
    |--------------------------------------------------------------------------
    | Cart
    |--------------------------------------------------------------------------
    */

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Menu
    |--------------------------------------------------------------------------
    */

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}