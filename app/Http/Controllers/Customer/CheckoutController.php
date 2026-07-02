<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ItemPesanan;
use App\Models\Meja;
use App\Models\Pesanan;
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

        // Ambil semua meja yang tersedia
        $mejas = Meja::where('status', 'tersedia')
            ->orderBy('nomor_meja')
            ->get();

        // Hitung total
        $total = $cart->items->sum('subtotal');

        return view('customer.checkout.index', compact(
            'cart',
            'mejas',
            'total'
        ));
    }

    /**
     * Simpan Pesanan
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan'    => 'required|string|max:100',
            'meja_id'           => 'required|exists:mejas,id',
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
            // Cek Meja
            $meja = Meja::lockForUpdate()->findOrFail($request->meja_id);

            if ($meja->status != 'tersedia') {
                DB::rollBack();
                return back()->with('error', 'Meja yang dipilih sudah digunakan.');
            }

            // Total
            $total = $cart->items->sum('subtotal');

            // Simpan Pesanan
            $pesanan = Pesanan::create([
                'nomor_pesanan'     => 'ORD-' . now()->format('YmdHis'),
                'nama_pelanggan'    => $request->nama_pelanggan,
                'meja_id'           => $meja->id,
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

            // Item Pesanan
            foreach ($cart->items as $item) {
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

            // Update Status Meja
            $meja->update(['status' => 'terisi']);

            // Kosongkan Keranjang
            $cart->items()->delete();

            DB::commit();

            return redirect()
                ->route('customer.pesanan.index')
                ->with('success', 'Pesanan berhasil dibuat.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
}