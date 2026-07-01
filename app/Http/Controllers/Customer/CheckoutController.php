<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Pesanan;
use App\Models\ItemPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Halaman Checkout
     */
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->with('items.menu')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang masih kosong.');
        }

        return view('customer.checkout.index', compact('cart'));
    }

    /**
     * Simpan Pesanan
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan'    => 'required|string|max:100',
            'metode_pembayaran' => 'required|string|max:50',
            'catatan'           => 'nullable|string',
        ]);

        $cart = Cart::where('user_id', Auth::id())
            ->with('items.menu')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang kosong.');
        }

        DB::beginTransaction();

        try {

            $total = $cart->items->sum('subtotal');

            $pesanan = Pesanan::create([
                'nomor_pesanan'     => 'ORD-' . now()->format('YmdHis'),
                'nama_pelanggan'    => $request->nama_pelanggan,
                'meja_id'           => 1,
                'user_id'           => Auth::id(),
                'total_harga'       => $total,
                'status'            => 'Menunggu',
                'status_pembayaran' => 'Belum Bayar',
                'metode_pembayaran' => $request->metode_pembayaran,
                'jumlah_bayar'      => 0,
                'kembalian'         => 0,
                'catatan'           => $request->catatan,
                'tanggal_pesanan'   => now(),
            ]);

            foreach ($cart->items as $item) {

                if (!$item->menu_id) {
                    throw new \Exception("CartItem ID {$item->id} tidak memiliki menu_id.");
                }

                if (!$item->menu) {
                    throw new \Exception("Menu dengan ID {$item->menu_id} tidak ditemukan.");
                }
ItemPesanan::create([
    'pesanan_id' => $pesanan->id,
    'menu_id'    => $item->menu_id,
    'qty'        => $item->qty,
    'harga'      => $item->harga,
    'subtotal'   => $item->subtotal,
    'catatan'    => null,
]); 
            }

            $cart->items()->delete();

            DB::commit();

            return redirect()
                ->route('home')
                ->with('success', 'Pesanan berhasil dibuat.');
        } catch (\Exception $e) {

            DB::rollBack();

            dd(
                $e->getMessage(),
                [
                    'cart_items' => $cart->items->toArray(),
                ]
            );
        }
    }
}