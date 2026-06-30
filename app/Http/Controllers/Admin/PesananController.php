<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Daftar Pesanan
     */
    public function index(Request $request)
    {
        $query = Pesanan::with(['user', 'meja'])
            ->latest();

        // Cari Nomor Pesanan / Nama Pelanggan
        if ($request->filled('search')) {

            $query->where(function ($q) use ($request) {

                $q->where('nomor_pesanan', 'like', '%' . $request->search . '%')
                  ->orWhere('nama_pelanggan', 'like', '%' . $request->search . '%');

            });

        }

        // Filter Status
        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }

        $pesanans = $query
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.pesanan.index',
            compact('pesanans')
        );
    }

    /**
     * Detail Pesanan
     */
    public function show(Pesanan $pesanan)
    {
        $pesanan->load([
            'user',
            'meja',
            'itemPesanans.menu'
        ]);

        return view(
            'admin.pesanan.show',
            compact('pesanan')
        );
    }

    /**
     * Form Edit Status
     */
    public function edit(Pesanan $pesanan)
    {
        return view(
            'admin.pesanan.edit',
            compact('pesanan')
        );
    }

    /**
     * Update Pesanan
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([

            'status' => [
                'required',
                'in:Menunggu,Diproses,Selesai,Dibatalkan'
            ],

            'status_pembayaran' => [
                'required',
                'in:Belum Bayar,Lunas'
            ],

        ]);

        $pesanan->update([

            'status' => $request->status,

            'status_pembayaran' => $request->status_pembayaran,

        ]);

        return redirect()
            ->route('admin.pesanan.index')
            ->with(
                'success',
                'Status pesanan berhasil diperbarui.'
            );
    }

    /**
     * Hapus Pesanan
     */
    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();

        return redirect()
            ->route('admin.pesanan.index')
            ->with(
                'success',
                'Pesanan berhasil dihapus.'
            );
    }
}