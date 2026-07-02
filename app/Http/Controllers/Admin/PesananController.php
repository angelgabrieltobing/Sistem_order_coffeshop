<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    /**
     * Daftar Pesanan
     */
    public function index(Request $request)
    {
        $query = Pesanan::with([
            'user',
            'meja'
        ])->latest();

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $query->where(function ($q) use ($request) {

                $q->where('nomor_pesanan', 'like', '%' . $request->search . '%')
                    ->orWhere('nama_pelanggan', 'like', '%' . $request->search . '%');

            });

        }

        /*
        |--------------------------------------------------------------------------
        | Filter Status
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }

        /*
        |--------------------------------------------------------------------------
        | Filter Status Pembayaran
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status_pembayaran')) {

            $query->where(
                'status_pembayaran',
                $request->status_pembayaran
            );

        }

        /*
        |--------------------------------------------------------------------------
        | Statistik
        |--------------------------------------------------------------------------
        */

        $totalPesanan = Pesanan::count();

        $pesananHariIni = Pesanan::whereDate(
            'tanggal_pesanan',
            today()
        )->count();

        $pendapatan = Pesanan::where(
            'status_pembayaran',
            'Lunas'
        )->sum('total_harga');

        $menunggu = Pesanan::where(
            'status',
            'Menunggu'
        )->count();

        $diproses = Pesanan::where(
            'status',
            'Diproses'
        )->count();

        $selesai = Pesanan::where(
            'status',
            'Selesai'
        )->count();

        $dibatalkan = Pesanan::where(
            'status',
            'Dibatalkan'
        )->count();

        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        $pesanans = $query
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.pesanan.index',
            compact(
                'pesanans',
                'totalPesanan',
                'pesananHariIni',
                'pendapatan',
                'menunggu',
                'diproses',
                'selesai',
                'dibatalkan'
            )
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
     * Form Edit
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

            'status' => 'required|in:Menunggu,Diproses,Selesai,Dibatalkan',

            'status_pembayaran' => 'required|in:Belum Bayar,Lunas,Refund',

        ]);

        DB::beginTransaction();

        try {

            $pesanan->status = $request->status;

            $pesanan->status_pembayaran = $request->status_pembayaran;

            /*
            |--------------------------------------------------------------------------
            | Status Pesanan
            |--------------------------------------------------------------------------
            */

            if ($request->status == 'Selesai') {

                if (!$pesanan->selesai_pada) {

                    $pesanan->selesai_pada = now();

                }

            } else {

                $pesanan->selesai_pada = null;

            }

            /*
            |--------------------------------------------------------------------------
            | Status Pembayaran
            |--------------------------------------------------------------------------
            */

            if ($request->status_pembayaran == 'Lunas') {

                if (!$pesanan->bayar_pada) {

                    $pesanan->bayar_pada = now();

                }

            } else {

                $pesanan->bayar_pada = null;

            }

            $pesanan->save();

            /*
            |--------------------------------------------------------------------------
            | Update Status Meja
            |--------------------------------------------------------------------------
            */

            if ($pesanan->meja) {

                if (
                    $request->status == 'Selesai' ||
                    $request->status == 'Dibatalkan'
                ) {

                    $pesanan->meja->update([
                        'status' => 'tersedia',
                    ]);

                } else {

                    $pesanan->meja->update([
                        'status' => 'terisi',
                    ]);

                }

            }

            DB::commit();

            return redirect()
                ->route('admin.pesanan.index')
                ->with(
                    'success',
                    'Status pesanan berhasil diperbarui.'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with(
                'error',
                $e->getMessage()
            );

        }
    }

    /**
     * Hapus Pesanan
     */
    public function destroy(Pesanan $pesanan)
    {
        DB::beginTransaction();

        try {

            if ($pesanan->meja) {

                $pesanan->meja->update([
                    'status' => 'tersedia',
                ]);

            }

            $pesanan->delete();

            DB::commit();

            return redirect()
                ->route('admin.pesanan.index')
                ->with(
                    'success',
                    'Pesanan berhasil dihapus.'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}