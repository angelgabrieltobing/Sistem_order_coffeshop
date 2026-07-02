<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mejas = Meja::all();
        return view('admin.meja.index', compact('mejas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.meja.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_meja' => 'required|integer|unique:mejas',
            'kapasitas' => 'required|integer|min:1',
            'status' => 'required|in:tersedia,digunakan,dipesan',
        ]);

        Meja::create($request->all());

        return redirect()->route('admin.meja.index')
            ->with('success', 'Meja berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meja $meja)
    {
        return view('admin.meja.show', compact('meja'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meja $meja)
    {
        return view('admin.meja.edit', compact('meja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meja $meja)
    {
        $request->validate([
            'nomor_meja' => 'required|integer|unique:mejas,nomor_meja,' . $meja->id,
            'kapasitas' => 'required|integer|min:1',
            'status' => 'required|in:tersedia,digunakan,dipesan',
        ]);

        $meja->update($request->all());

        return redirect()->route('admin.meja.index')
            ->with('success', 'Meja berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meja $meja)
    {
        $meja->delete();

        return redirect()->route('admin.meja.index')
            ->with('success', 'Meja berhasil dihapus.');
    }

    /**
     * Toggle meja status.
     */
    public function toggle(Meja $meja)
    {
        $meja->status = $meja->status === 'tersedia' ? 'digunakan' : 'tersedia';
        $meja->save();

        return redirect()->route('admin.meja.index')
            ->with('success', 'Status meja berhasil diubah.');
    }
}