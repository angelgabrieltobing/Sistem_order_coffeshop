@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Dashboard Administrator')

@section('content')

<div class="container-fluid">

    {{-- Header Dashboard --}}
    <div class="row mb-4">

        <div class="col-lg-12">

            <div class="card shadow border-0">

                <div class="card-body">

                    <div class="row align-items-center">

                        <div class="col-md-8">

                            <h2 class="fw-bold mb-2">

                                Selamat Datang,

                                {{ Auth::user()->name }}

                                👋

                            </h2>

                            <p class="text-muted mb-0">

                                Kelola seluruh aktivitas Coffee Shop melalui dashboard administrator.

                            </p>

                        </div>

                        <div class="col-md-4 text-end">

                            <h5 class="mb-1">

                                {{ now()->format('d F Y') }}

                            </h5>

                            <small class="text-muted">

                                {{ now()->format('H:i') }} WIB

                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Statistik --}}
    <div class="row">

        {{-- Menu --}}
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card shadow border-start border-warning border-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

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

        {{-- Customer --}}
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card shadow border-start border-primary border-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">

                                Customer

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $totalCustomer }}

                            </h2>

                        </div>

                        <div>

                            <i class="fa-solid fa-user fa-3x text-primary"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Admin --}}
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card shadow border-start border-danger border-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">

                                Administrator

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $totalAdmin }}

                            </h2>

                        </div>

                        <div>

                            <i class="fa-solid fa-user-shield fa-3x text-danger"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Pesanan --}}
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card shadow border-start border-success border-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

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

    {{-- Statistik Kedua --}}
    <div class="row">

        {{-- Total Meja --}}
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card shadow border-start border-info border-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">

                                Total Meja

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $totalMeja }}

                            </h2>

                        </div>

                        <div>

                            <i class="fa-solid fa-chair fa-3x text-info"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Meja Tersedia --}}
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card shadow border-start border-success border-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">

                                Meja Tersedia

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $mejaTersedia }}

                            </h2>

                        </div>

                        <div>

                            <i class="fa-solid fa-circle-check fa-3x text-success"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Meja Terisi --}}
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card shadow border-start border-warning border-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">

                                Meja Terisi

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $mejaTerisi }}

                            </h2>

                        </div>

                        <div>

                            <i class="fa-solid fa-chair fa-3x text-warning"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Total User --}}
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card shadow border-start border-secondary border-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">

                                Total User

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $totalUser }}

                            </h2>

                        </div>

                        <div>

                            <i class="fa-solid fa-users fa-3x text-secondary"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
        {{-- Pendapatan --}}
    <div class="row">

        <div class="col-lg-6 mb-4">

            <div class="card shadow border-0">

                <div class="card-header bg-success text-white">

                    <h5 class="mb-0">

                        <i class="fa-solid fa-money-bill-wave"></i>

                        Pendapatan

                    </h5>

                </div>

                <div class="card-body">

                    <div class="row text-center">

                        <div class="col-md-6 border-end">

                            <h6 class="text-muted">

                                Hari Ini

                            </h6>

                            <h3 class="fw-bold text-success">

                                Rp {{ number_format($pendapatanHariIni,0,',','.') }}

                            </h3>

                        </div>

                        <div class="col-md-6">

                            <h6 class="text-muted">

                                Total Pendapatan

                            </h6>

                            <h3 class="fw-bold text-primary">

                                Rp {{ number_format($totalPendapatan,0,',','.') }}

                            </h3>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <div class="card shadow border-0">

                <div class="card-header bg-primary text-white">

                    <h5 class="mb-0">

                        <i class="fa-solid fa-chart-pie"></i>

                        Status Pesanan

                    </h5>

                </div>

                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-6">

                            <div class="border rounded p-3 text-center">

                                <h6 class="text-warning">

                                    Menunggu

                                </h6>

                                <h2 class="fw-bold">

                                    {{ $pesananMenunggu }}

                                </h2>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="border rounded p-3 text-center">

                                <h6 class="text-primary">

                                    Diproses

                                </h6>

                                <h2 class="fw-bold">

                                    {{ $pesananDiproses }}

                                </h2>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="border rounded p-3 text-center">

                                <h6 class="text-success">

                                    Selesai

                                </h6>

                                <h2 class="fw-bold">

                                    {{ $pesananSelesai }}

                                </h2>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="border rounded p-3 text-center">

                                <h6 class="text-danger">

                                    Dibatalkan

                                </h6>

                                <h2 class="fw-bold">

                                    {{ $pesananDibatalkan }}

                                </h2>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Status Meja --}}
    <div class="row">

        <div class="col-lg-12 mb-4">

            <div class="card shadow border-0">

                <div class="card-header bg-dark text-white">

                    <h5 class="mb-0">

                        <i class="fa-solid fa-chair"></i>

                        Status Meja Coffee Shop

                    </h5>

                </div>

                <div class="card-body">

                    @php

                        $persenTersedia = $totalMeja > 0
                            ? round(($mejaTersedia / $totalMeja) * 100)
                            : 0;

                        $persenTerisi = $totalMeja > 0
                            ? round(($mejaTerisi / $totalMeja) * 100)
                            : 0;

                    @endphp

                    <div class="mb-4">

                        <div class="d-flex justify-content-between">

                            <strong>

                                Meja Tersedia

                            </strong>

                            <strong>

                                {{ $mejaTersedia }}

                                /

                                {{ $totalMeja }}

                            </strong>

                        </div>

                        <div class="progress mt-2">

                           <div
    class="progress-bar bg-success"
    @style([
        "width: {$persenTersedia}%"
    ])>

    {{ $persenTersedia }}%

</div>

                        </div>

                    </div>

                    <div>

                        <div class="d-flex justify-content-between">

                            <strong>

                                Meja Terisi

                            </strong>

                            <strong>

                                {{ $mejaTerisi }}

                                /

                                {{ $totalMeja }}

                            </strong>

                        </div>

                        <div class="progress mt-2">

                            <div
    class="progress-bar bg-warning"
    @style([
        "width: {$persenTerisi}%"
    ])>

    {{ $persenTerisi }}%

</div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
        {{-- Pesanan Terbaru --}}
    <div class="row">

        <div class="col-lg-12">

            <div class="card shadow border-0 mb-4">

                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">

                        <i class="fa-solid fa-cart-shopping"></i>

                        Pesanan Terbaru

                    </h5>

                    <a
                        href="{{ route('admin.pesanan.index') }}"
                        class="btn btn-light btn-sm">

                        Lihat Semua

                    </a>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead class="table-light">

                                <tr>

                                    <th>No</th>

                                    <th>No Pesanan</th>

                                    <th>Customer</th>

                                    <th>Meja</th>

                                    <th>Total</th>

                                    <th>Status</th>

                                    <th>Pembayaran</th>

                                    <th>Tanggal</th>

                                    <th width="120">

                                        Aksi

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($pesananTerbaru as $pesanan)

                                <tr>

                                    <td>

                                        {{ $loop->iteration }}

                                    </td>

                                    <td>

                                        <strong>

                                            {{ $pesanan->nomor_pesanan }}

                                        </strong>

                                    </td>

                                    <td>

                                        {{ $pesanan->nama_pelanggan }}

                                    </td>

                                    <td>

                                        {{ optional($pesanan->meja)->nomor_meja ?? '-' }}

                                    </td>

                                    <td>

                                        Rp {{ number_format($pesanan->total_harga,0,',','.') }}

                                    </td>

                                    <td>

                                        @if($pesanan->status=='Menunggu')

                                            <span class="badge bg-warning">

                                                Menunggu

                                            </span>

                                        @elseif($pesanan->status=='Diproses')

                                            <span class="badge bg-primary">

                                                Diproses

                                            </span>

                                        @elseif($pesanan->status=='Selesai')

                                            <span class="badge bg-success">

                                                Selesai

                                            </span>

                                        @else

                                            <span class="badge bg-danger">

                                                Dibatalkan

                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        @if($pesanan->status_pembayaran=='Belum Bayar')

                                            <span class="badge bg-secondary">

                                                Belum Bayar

                                            </span>

                                        @elseif($pesanan->status_pembayaran=='Lunas')

                                            <span class="badge bg-success">

                                                Lunas

                                            </span>

                                        @else

                                            <span class="badge bg-danger">

                                                Refund

                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        {{ optional($pesanan->tanggal_pesanan)->format('d M Y') }}

                                    </td>

                                    <td>

                                        <a
                                            href="{{ route('admin.pesanan.show',$pesanan) }}"
                                            class="btn btn-info btn-sm">

                                            <i class="fa-solid fa-eye"></i>

                                        </a>

                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td
                                        colspan="9"
                                        class="text-center py-5 text-muted">

                                        <i class="fa-solid fa-cart-shopping fa-3x mb-3"></i>

                                        <br>

                                        Belum ada pesanan.

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>
        {{-- Menu Terbaru & Quick Action --}}
    <div class="row">

        {{-- Menu Terbaru --}}
        <div class="col-lg-8 mb-4">

            <div class="card shadow border-0">

                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">

                        <i class="fa-solid fa-mug-hot"></i>

                        Menu Terbaru

                    </h5>

                    <a
                        href="{{ route('admin.menu.index') }}"
                        class="btn btn-light btn-sm">

                        Lihat Semua

                    </a>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead class="table-light">

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

                                </tr>

                                @empty

                                <tr>

                                    <td colspan="5" class="text-center py-5 text-muted">

                                        <i class="fa-solid fa-mug-hot fa-3x mb-3"></i>

                                        <br>

                                        Belum ada menu.

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        {{-- Quick Action --}}
        <div class="col-lg-4 mb-4">

            <div class="card shadow border-0">

                <div class="card-header bg-primary text-white">

                    <h5 class="mb-0">

                        <i class="fa-solid fa-bolt"></i>

                        Quick Action

                    </h5>

                </div>

                <div class="card-body d-grid gap-3">

                    <a
                        href="{{ route('admin.menu.create') }}"
                        class="btn btn-success">

                        <i class="fa-solid fa-plus"></i>

                        Tambah Menu

                    </a>

                    <a
                        href="{{ route('admin.menu.index') }}"
                        class="btn btn-primary">

                        <i class="fa-solid fa-mug-hot"></i>

                        Kelola Menu

                    </a>

                    <a
                        href="{{ route('admin.pesanan.index') }}"
                        class="btn btn-warning text-dark">

                        <i class="fa-solid fa-cart-shopping"></i>

                        Kelola Pesanan

                    </a>

                    <a
                        href="{{ route('admin.users.index') }}"
                        class="btn btn-info text-white">

                        <i class="fa-solid fa-users"></i>

                        Kelola User

                    </a>

                    <form
                        action="{{ route('logout') }}"
                        method="POST">

                        @csrf

                        <button
                            class="btn btn-danger w-100">

                            <i class="fa-solid fa-right-from-bracket"></i>

                            Logout

                        </button>

                    </form>

                </div>

            </div>

            {{-- Informasi Sistem --}}
            <div class="card shadow border-0 mt-4">

                <div class="card-body text-center">

                    <i class="fa-solid fa-mug-hot fa-3x text-warning mb-3"></i>

                    <h5 class="fw-bold">

                        Coffee Shop System

                    </h5>

                    <p class="text-muted mb-1">

                        Dashboard Administrator

                    </p>

                    <small class="text-muted">

                        Laravel 12 • Bootstrap 5

                    </small>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection