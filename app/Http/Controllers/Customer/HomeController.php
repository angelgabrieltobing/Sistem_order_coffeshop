<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        $menus = Menu::where('status', 'Tersedia')
            ->latest()
            ->take(6)
            ->get();

        return view('welcome', compact('menus'));
    }
}