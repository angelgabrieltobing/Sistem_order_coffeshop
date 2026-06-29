<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Menampilkan daftar menu
     */
    public function index(Request $request)
    {
        $query = Menu::query();

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $query->where('nama', 'like', '%' . $request->search . '%');

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
        | Filter Kategori
        |--------------------------------------------------------------------------
        */

        if ($request->filled('kategori')) {

            $query->where('kategori', $request->kategori);

        }

        $menus = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Form tambah menu
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Simpan menu
     */
    public function store(MenuRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('gambar')) {

            $data['gambar'] = $request
                ->file('gambar')
                ->store('menu', 'public');

        }

        Menu::create($data);

        return redirect()
            ->route('admin.menu.index')
            ->with('success', 'Menu berhasil ditambahkan.');
    }

    /**
     * Detail menu
     */
    public function show(Menu $menu)
    {
        return view('admin.menu.show', compact('menu'));
    }

    /**
     * Form edit
     */
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    /**
     * Update menu
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $data = $request->validated();

        if ($request->hasFile('gambar')) {

            if ($menu->gambar &&
                Storage::disk('public')->exists($menu->gambar)) {

                Storage::disk('public')->delete($menu->gambar);

            }

            $data['gambar'] = $request
                ->file('gambar')
                ->store('menu', 'public');
        }

        $menu->update($data);

        return redirect()
            ->route('admin.menu.index')
            ->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Hapus menu
     */
    public function destroy(Menu $menu)
    {
        if (
            $menu->gambar &&
            Storage::disk('public')->exists($menu->gambar)
        ) {

            Storage::disk('public')->delete($menu->gambar);

        }

        $menu->delete();

        return redirect()
            ->route('admin.menu.index')
            ->with('success', 'Menu berhasil dihapus.');
    }
}