<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Menampilkan keranjang belanja
     */
    public function index()
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
        ]);

        $cart->load('items.menu');

        return view('customer.cart.index', compact('cart'));
    }

    /**
     * Tambah menu ke keranjang
     */
    public function add(Menu $menu)
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
        ]);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('menu_id', $menu->id)
            ->first();

        if ($item) {

            $item->qty += 1;
            $item->subtotal = $item->qty * $item->harga;
            $item->save();

        } else {

            CartItem::create([
                'cart_id'  => $cart->id,
                'menu_id'  => $menu->id,
                'qty'      => 1,
                'harga'    => $menu->harga,
                'subtotal' => $menu->harga,
            ]);

        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Menu berhasil ditambahkan ke keranjang.');
    }

    /**
     * Update jumlah item
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $cart = Cart::where('user_id', Auth::id())->firstOrFail();

        $item = CartItem::where('cart_id', $cart->id)
            ->where('menu_id', $menu->id)
            ->firstOrFail();

        $item->qty = $request->qty;
        $item->subtotal = $item->qty * $item->harga;
        $item->save();

        return redirect()
            ->route('cart.index')
            ->with('success', 'Jumlah menu berhasil diperbarui.');
    }

    /**
     * Hapus satu item dari keranjang
     */
    public function remove(Menu $menu)
    {
        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart) {

            CartItem::where('cart_id', $cart->id)
                ->where('menu_id', $menu->id)
                ->delete();

        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Menu berhasil dihapus dari keranjang.');
    }

    /**
     * Kosongkan keranjang
     */
    public function clear()
    {
        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart) {

            CartItem::where('cart_id', $cart->id)->delete();

        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Keranjang berhasil dikosongkan.');
    }
}