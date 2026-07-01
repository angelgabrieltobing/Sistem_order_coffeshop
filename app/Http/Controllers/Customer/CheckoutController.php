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
     * Menampilkan halaman checkout
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
     * Proses checkout
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'metode_pembayaran' => 'required|string',
            'catatan' => 'nullable|string',
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

                'nomor_pesanan' => 'ORD-' . now()->format('YmdHis'),

                'nama_pelanggan' => $request->nama_pelanggan,

                'user_id' => Auth::id(),

                'meja_id' => null,

                'total_harga' => $total,

                'status' => 'Menunggu',

                'status_pembayaran' => 'Belum Dibayar',

                'metode_pembayaran' => $request->metode_pembayaran,

                'jumlah_bayar' => 0,

                'kembalian' => 0,

                'catatan' => $request->catatan,

                'tanggal_pesanan' => now(),

            ]);

            foreach ($cart->items as $item) {

                ItemPesanan::create([

                    'pesanan_id' => $pesanan->id,

                    'menu_id' => $item->menu_id,

                    'qty' => $item->qty,

                    'harga' => $item->harga,

                    'subtotal' => $item->subtotal,

                    'catatan' => null,

                ]);

            }

            $cart->items()->delete();

            DB::commit();

            return redirect()
                ->route('home')
                ->with('success', 'Checkout berhasil.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with(
                'error',
                'Checkout gagal : ' . $e->getMessage()
            );
        }
    }
}