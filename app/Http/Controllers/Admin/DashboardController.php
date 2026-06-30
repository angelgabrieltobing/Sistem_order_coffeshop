<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Dashboard Admin
     */
    public function index()
    {
        // Statistik
        $totalMenu = Menu::count();

        $totalUser = User::count();

        $totalPesanan = Pesanan::count();

        // Menu terbaru
        $menus = Menu::latest()
            ->take(5)
            ->get();

        // Pesanan terbaru
        $pesananTerbaru = Pesanan::latest()
            ->take(5)
            ->get();

        // Total Pendapatan
        $totalPendapatan = Pesanan::sum('total_harga');

        return view('admin.dashboard', compact(
            'totalMenu',
            'totalUser',
            'totalPesanan',
            'totalPendapatan',
            'menus',
            'pesananTerbaru'
        ));
    }
}