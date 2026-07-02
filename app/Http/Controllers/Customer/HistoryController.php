<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Riwayat Pesanan
     */
    public function index()
    {
        $pesanans = Pesanan::with([
                'meja',
                'itemPesanans.menu',
            ])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view(
            'customer.pesanan.index',
            compact('pesanans')
        );
    }

    /**
     * Detail Pesanan
     */
    public function show(Pesanan $pesanan)
    {
        if ($pesanan->user_id !== Auth::id()) {
            abort(403);
        }

        $pesanan->load([
            'meja',
            'itemPesanans.menu',
        ]);

        return view(
            'customer.pesanan.show',
            compact('pesanan')
        );
    }

    /**
     * Receipt / Struk
     */
    public function receipt(Pesanan $pesanan)
    {
        if ($pesanan->user_id !== Auth::id()) {
            abort(403);
        }

        $pesanan->load([
            'meja',
            'itemPesanans.menu',
        ]);

        return view(
            'customer.pesanan.receipt',
            compact('pesanan')
        );
    }
}