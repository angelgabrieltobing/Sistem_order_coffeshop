<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Meja;
use App\Models\Pesanan;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Dashboard Admin
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Statistik User
        |--------------------------------------------------------------------------
        */

        $totalUser = User::count();

        $totalAdmin = User::where('role', 'admin')->count();

        $totalCustomer = User::where('role', 'customer')->count();

        /*
        |--------------------------------------------------------------------------
        | Statistik Menu
        |--------------------------------------------------------------------------
        */

        $totalMenu = Menu::count();

        /*
        |--------------------------------------------------------------------------
        | Statistik Meja
        |--------------------------------------------------------------------------
        */

        $totalMeja = Meja::count();

        $mejaTersedia = Meja::where('status', 'tersedia')->count();

        $mejaTerisi = Meja::where('status', 'terisi')->count();

        /*
        |--------------------------------------------------------------------------
        | Statistik Pesanan
        |--------------------------------------------------------------------------
        */

        $totalPesanan = Pesanan::count();

        $pesananMenunggu = Pesanan::where('status', 'Menunggu')->count();

        $pesananDiproses = Pesanan::where('status', 'Diproses')->count();

        $pesananSelesai = Pesanan::where('status', 'Selesai')->count();

        $pesananDibatalkan = Pesanan::where('status', 'Dibatalkan')->count();

        /*
        |--------------------------------------------------------------------------
        | Pendapatan
        |--------------------------------------------------------------------------
        */

        $totalPendapatan = Pesanan::where(
                'status_pembayaran',
                'Lunas'
            )
            ->sum('total_harga');

        $pendapatanHariIni = Pesanan::whereDate(
                'tanggal_pesanan',
                today()
            )
            ->where('status_pembayaran', 'Lunas')
            ->sum('total_harga');

        /*
        |--------------------------------------------------------------------------
        | Data Terbaru
        |--------------------------------------------------------------------------
        */

        $menus = Menu::latest()
            ->take(5)
            ->get();

        $pesananTerbaru = Pesanan::with([
                'user',
                'meja'
            ])
            ->latest()
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */

        return view('admin.dashboard', compact(

            'totalMenu',

            'totalUser',

            'totalAdmin',

            'totalCustomer',

            'totalMeja',

            'mejaTersedia',

            'mejaTerisi',

            'totalPesanan',

            'pesananMenunggu',

            'pesananDiproses',

            'pesananSelesai',

            'pesananDibatalkan',

            'totalPendapatan',

            'pendapatanHariIni',

            'menus',

            'pesananTerbaru'

        ));
    }
}