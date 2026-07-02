<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua menu yang tersedia (is_available = 1)
        $query = Menu::where('is_available', 1);
        
        // Filter pencarian berdasarkan nama menu
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori (jika ada)
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Urutkan dari terbaru, paginate 9 per halaman
        $menus = $query->latest()->paginate(9);
        
        // Ambil semua kategori untuk filter dropdown
        $kategoris = Kategori::all();

        // Kirim data ke view
        return view('customer.menu.index', compact('menus', 'kategoris'));
    }

    public function show($id)
    {
        $menu = Menu::where('is_available', 1)->findOrFail($id);
        return view('customer.menu.show', compact('menu'));
    }
}