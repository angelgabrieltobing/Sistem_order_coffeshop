<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Menampilkan daftar menu untuk pelanggan
     */
    public function index(Request $request)
    {
        $kategoris = Kategori::where('aktif', true)->get();
        
        $query = Produk::with('kategori')
            ->where('aktif', true)
            ->where('stok', '>', 0);

        // Filter berdasarkan kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori_id', $request->kategori);
        }

        // Cari berdasarkan nama
        if ($request->has('cari') && $request->cari != '') {
            $query->where('nama', 'LIKE', '%' . $request->cari . '%');
        }

        $produks = $query->get();

        return view('menu.index', compact('produks', 'kategoris'));
    }

    /**
     * Menampilkan detail produk
     */
    public function show(int $id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);
        return view('menu.show', compact('produk'));
    }

    /**
     * API: Get menu for mobile/QR Code
     */
    public function apiMenu()
    {
        $produks = Produk::with('kategori')
            ->where('aktif', true)
            ->where('stok', '>', 0)
            ->get();

        return response()->json([
            'status' => 'sukses',
            'data' => $produks
        ]);
    }
}