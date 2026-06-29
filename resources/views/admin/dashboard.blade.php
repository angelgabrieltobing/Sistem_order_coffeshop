@extends('layouts.admin')

@section('title','Dashboard Admin')

@section('page-title','Dashboard Administrator')

@section('content')

<div class="container-fluid">

    <div class="row">

        <!-- Total Menu -->

        <div class="col-lg-4 mb-4">

            <div class="card stat-card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Total Menu

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $totalMenu }}

                            </h2>

                        </div>

                        <div>

                            <i class="fa-solid fa-mug-hot fa-3x text-warning"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Total User -->

        <div class="col-lg-4 mb-4">

            <div class="card stat-card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Total User

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $totalUser }}

                            </h2>

                        </div>

                        <div>

                            <i class="fa-solid fa-users fa-3x text-primary"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Total Pesanan -->

        <div class="col-lg-4 mb-4">

            <div class="card stat-card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Total Pesanan

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $totalPesanan }}

                            </h2>

                        </div>

                        <div>

                            <i class="fa-solid fa-cart-shopping fa-3x text-success"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Welcome -->

    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <h4 class="fw-bold">

                Selamat Datang,

                {{ Auth::user()->name }}

            </h4>

            <hr>

            <p>

                <strong>Email :</strong>

                {{ Auth::user()->email }}

            </p>

            <p>

                <strong>Role :</strong>

                {{ ucfirst(Auth::user()->role) }}

            </p>

        </div>

    </div>

    <!-- Menu Terbaru -->

    <div class="card shadow">

        <div class="card-header bg-dark text-white">

            <h5 class="mb-0">

                Menu Terbaru

            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>No</th>

                            <th>Nama Menu</th>

                            <th>Kategori</th>

                            <th>Harga</th>

                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($menus as $menu)
                                                <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                {{ $menu->nama }}

                            </td>

                            <td>

                                {{ $menu->kategori }}

                            </td>

                            <td>

                                Rp {{ number_format($menu->harga,0,',','.') }}

                            </td>

                            <td>

                                @if($menu->status == 'Tersedia')

                                    <span class="badge bg-success">

                                        Tersedia

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Habis

                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5" class="text-center py-5">

                                <img
                                    src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png"
                                    width="120"
                                    class="mb-3">

                                <br>

                                Belum ada menu yang ditambahkan.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- Quick Menu -->

    <div class="row mt-4">

        <div class="col-md-4 mb-3">

            <a
                href="{{ route('admin.menu.create') }}"
                class="btn btn-success w-100 p-3">

                <i class="fa-solid fa-plus"></i>

                Tambah Menu

            </a>

        </div>

        <div class="col-md-4 mb-3">

            <a
                href="{{ route('admin.menu.index') }}"
                class="btn btn-primary w-100 p-3">

                <i class="fa-solid fa-mug-hot"></i>

                Kelola Menu

            </a>

        </div>

        <div class="col-md-4 mb-3">

            <form
                action="{{ route('logout') }}"
                method="POST">

                @csrf

                <button
                    class="btn btn-danger w-100 p-3">

                    <i class="fa-solid fa-right-from-bracket"></i>

                    Logout

                </button>

            </form>

        </div>

    </div>

</div>

@endsection