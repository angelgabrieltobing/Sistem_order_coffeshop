<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    /**
     * Dashboard Admin
     */
    public function index()
    {
        $totalMenu = Menu::count();

        $totalUser = User::count();

        /*
        |--------------------------------------------------------------------------
        | Jika tabel pesanan belum dipakai,
        | tampilkan 0 agar tidak error
        |--------------------------------------------------------------------------
        */

        if (class_exists(Pesanan::class)) {

            $totalPesanan = Pesanan::count();

        } else {

            $totalPesanan = 0;

        }

        /*
        |--------------------------------------------------------------------------
        | Menu Terbaru
        |--------------------------------------------------------------------------
        */

        $menus = Menu::latest()
                    ->take(5)
                    ->get();

        return view('admin.dashboard', compact(

            'totalMenu',

            'totalUser',

            'totalPesanan',

            'menus'

        ));
    }
}