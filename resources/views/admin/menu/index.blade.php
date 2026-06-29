@extends('layouts.admin')

@section('title','Kelola Menu')

@section('page-title','Kelola Menu Coffee Shop')

@section('content')

<div class="container-fluid">

    <div class="card mb-4">

        <div class="card-body">

            <form method="GET" action="{{ route('admin.menu.index') }}">

                <div class="row">

                    <div class="col-md-4">

                        <input
                            type="text"
                            class="form-control"
                            name="search"
                            placeholder="Cari nama menu..."
                            value="{{ request('search') }}">

                    </div>

                    <div class="col-md-3">

                        <select
                            class="form-select"
                            name="kategori">

                            <option value="">

                                Semua Kategori

                            </option>

                            <option
                                value="Coffee"
                                @selected(request('kategori')=='Coffee')>

                                Coffee

                            </option>

                            <option
                                value="Non Coffee"
                                @selected(request('kategori')=='Non Coffee')>

                                Non Coffee

                            </option>

                            <option
                                value="Tea"
                                @selected(request('kategori')=='Tea')>

                                Tea

                            </option>

                            <option
                                value="Snack"
                                @selected(request('kategori')=='Snack')>

                                Snack

                            </option>

                            <option
                                value="Dessert"
                                @selected(request('kategori')=='Dessert')>

                                Dessert

                            </option>

                        </select>

                    </div>

                    <div class="col-md-3">

                        <select
                            class="form-select"
                            name="status">

                            <option value="">

                                Semua Status

                            </option>

                            <option
                                value="Tersedia"
                                @selected(request('status')=='Tersedia')>

                                Tersedia

                            </option>

                            <option
                                value="Habis"
                                @selected(request('status')=='Habis')>

                                Habis

                            </option>

                        </select>

                    </div>

                    <div class="col-md-2 d-grid">

                        <button class="btn btn-primary">

                            <i class="fa fa-search"></i>

                            Cari

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>

            Daftar Menu Coffee Shop

        </h3>

        <a
            href="{{ route('admin.menu.create') }}"
            class="btn btn-success">

            <i class="fa fa-plus"></i>

            Tambah Menu

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th width="60">

                                No

                            </th>

                            <th width="120">

                                Gambar

                            </th>

                            <th>

                                Nama Menu

                            </th>

                            <th>

                                Kategori

                            </th>

                            <th>

                                Harga

                            </th>

                            <th>

                                Status

                            </th>

                            <th width="170">

                                Aksi

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($menus as $menu)
                                                <tr>

                            <td>

                                {{ $loop->iteration + ($menus->currentPage()-1) * $menus->perPage() }}

                            </td>

                            <td>

                                @if($menu->gambar)

                                    <img
                                        src="{{ asset('storage/'.$menu->gambar) }}"
                                        class="img-thumbnail"
                                        style="width:90px;height:90px;object-fit:cover;">

                                @else

                                    <img
                                        src="https://via.placeholder.com/90x90?text=No+Image"
                                        class="img-thumbnail">

                                @endif

                            </td>

                            <td>

                                <strong>

                                    {{ $menu->nama }}

                                </strong>

                            </td>

                            <td>

                                {{ $menu->kategori }}

                            </td>

                            <td>

                                Rp {{ number_format($menu->harga,0,',','.') }}

                            </td>

                            <td>

                                @if($menu->status=='Tersedia')

                                    <span class="badge bg-success">

                                        Tersedia

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Habis

                                    </span>

                                @endif

                            </td>

                            <td>

                                <a
                                    href="{{ route('admin.menu.edit',$menu->id) }}"
                                    class="btn btn-warning btn-sm">

                                    <i class="fa fa-edit"></i>

                                </a>

                                <form
                                    action="{{ route('admin.menu.destroy',$menu->id) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus menu ini?');">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm">

                                        <i class="fa fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7" class="text-center">

                                <img
                                    src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png"
                                    width="120"
                                    class="mb-3">

                                <br>

                                Belum ada data menu.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="d-flex justify-content-center mt-4">

                {{ $menus->links() }}

            </div>

        </div>

    </div>

</div>

@endsection