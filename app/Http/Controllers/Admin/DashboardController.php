<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Meja;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

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
        $menuTersedia = Menu::where('is_available', 1)->count(); // TAMBAHKAN INI
        $menuHabis = Menu::where('is_available', 0)->count();    // TAMBAHKAN INI

        /*
        |--------------------------------------------------------------------------
        | Statistik Meja
        |--------------------------------------------------------------------------
        */

        $totalMeja = Meja::count();
        $mejaTersedia = Meja::where('status', 'tersedia')->count();
        $mejaTerisi = Meja::where('status', 'terisi')->count();
        $mejaDipesan = Meja::where('status', 'dipesan')->count(); // TAMBAHKAN INI

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

        $totalPendapatan = Pesanan::where('status_pembayaran', 'Lunas')->sum('total_harga');
        $pendapatanHariIni = Pesanan::whereDate('tanggal_pesanan', today())
            ->where('status_pembayaran', 'Lunas')
            ->sum('total_harga');

        /*
        |--------------------------------------------------------------------------
        | Data Terbaru
        |--------------------------------------------------------------------------
        */

        $menus = Menu::latest()->take(5)->get();
        $pesananTerbaru = Pesanan::with(['user', 'meja'])
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
            'menuTersedia',      // TAMBAHKAN
            'menuHabis',         // TAMBAHKAN
            'totalUser',
            'totalAdmin',
            'totalCustomer',
            'totalMeja',
            'mejaTersedia',
            'mejaTerisi',
            'mejaDipesan',       // TAMBAHKAN
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

    /**
     * Halaman Laporan
     */
    public function laporan()
    {
        $pesanan = Pesanan::with(['user', 'meja'])
            ->latest()
            ->get();

        $totalPendapatan = Pesanan::where('status_pembayaran', 'Lunas')->sum('total_harga');
        $totalPesanan = Pesanan::count();

        return view('admin.laporan.index', compact('pesanan', 'totalPendapatan', 'totalPesanan'));
    }

    /**
     * Export Laporan (PDF/Excel)
     */
    public function exportLaporan()
    {
        // Implementasi export laporan
        // Bisa menggunakan paket: maatwebsite/excel atau barryvdh/laravel-dompdf

        return redirect()->route('admin.laporan')
            ->with('info', 'Fitur export laporan sedang dalam pengembangan.');
    }
}