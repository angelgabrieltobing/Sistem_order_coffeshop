@extends('layouts.admin')

@section('title','Kelola Pesanan')

@section('page-title','Kelola Pesanan')

@section('content')

<div class="container-fluid">

    {{-- Header --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">

                <i class="fa-solid fa-cart-shopping text-success"></i>

                Kelola Pesanan

            </h3>

            <p class="text-muted mb-0">

                Kelola seluruh transaksi customer Coffee Shop.

            </p>

        </div>

        <div>

            <a
                href="{{ route('admin.pesanan.index') }}"
                class="btn btn-success">

                <i class="fa-solid fa-rotate"></i>

                Refresh

            </a>

        </div>

    </div>

    {{-- Statistik --}}

    <div class="row mb-4">

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="card border-0 shadow">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Total Pesanan

                            </small>

                            <h2 class="fw-bold text-primary">

                                {{ $totalPesanan }}

                            </h2>

                        </div>

                        <i class="fa-solid fa-cart-shopping fa-3x text-primary"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="card border-0 shadow">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Pesanan Hari Ini

                            </small>

                            <h2 class="fw-bold text-success">

                                {{ $pesananHariIni }}

                            </h2>

                        </div>

                        <i class="fa-solid fa-calendar-day fa-3x text-success"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="card border-0 shadow">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Pendapatan

                            </small>

                            <h5 class="fw-bold text-warning">

                                Rp {{ number_format($pendapatan,0,',','.') }}

                            </h5>

                        </div>

                        <i class="fa-solid fa-money-bill-wave fa-3x text-warning"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="card border-0 shadow">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Status Selesai

                            </small>

                            <h2 class="fw-bold text-success">

                                {{ $selesai }}

                            </h2>

                        </div>

                        <i class="fa-solid fa-circle-check fa-3x text-success"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Statistik Status --}}

    <div class="row mb-4">

        <div class="col-md-3">

            <div class="alert alert-warning">

                <strong>Menunggu</strong>

                <span class="float-end">

                    {{ $menunggu }}

                </span>

            </div>

        </div>

        <div class="col-md-3">

            <div class="alert alert-primary">

                <strong>Diproses</strong>

                <span class="float-end">

                    {{ $diproses }}

                </span>

            </div>

        </div>

        <div class="col-md-3">

            <div class="alert alert-success">

                <strong>Selesai</strong>

                <span class="float-end">

                    {{ $selesai }}

                </span>

            </div>

        </div>

        <div class="col-md-3">

            <div class="alert alert-danger">

                <strong>Dibatalkan</strong>

                <span class="float-end">

                    {{ $dibatalkan }}

                </span>

            </div>

        </div>

    </div>

    {{-- Search & Filter --}}

    <div class="card shadow mb-4">

        <div class="card-header bg-dark text-white">

            <h5 class="mb-0">

                <i class="fa-solid fa-filter"></i>

                Pencarian & Filter

            </h5>

        </div>

        <div class="card-body">

            <form
                method="GET"
                action="{{ route('admin.pesanan.index') }}">

                <div class="row">

                    {{-- Search --}}

                    <div class="col-lg-4 mb-3">

                        <label class="form-label">

                            Cari Pesanan

                        </label>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Nomor Pesanan / Nama Customer">

                    </div>

                    {{-- Status Pesanan --}}

                    <div class="col-lg-3 mb-3">

                        <label class="form-label">

                            Status Pesanan

                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="">

                                Semua

                            </option>

                            <option
                                value="Menunggu"
                                @selected(request('status')=='Menunggu')>

                                Menunggu

                            </option>

                            <option
                                value="Diproses"
                                @selected(request('status')=='Diproses')>

                                Diproses

                            </option>

                            <option
                                value="Selesai"
                                @selected(request('status')=='Selesai')>

                                Selesai

                            </option>

                            <option
                                value="Dibatalkan"
                                @selected(request('status')=='Dibatalkan')>

                                Dibatalkan

                            </option>

                        </select>

                    </div>

                    {{-- Status Pembayaran --}}

                    <div class="col-lg-3 mb-3">

                        <label class="form-label">

                            Status Pembayaran

                        </label>

                        <select
                            name="status_pembayaran"
                            class="form-select">

                            <option value="">

                                Semua

                            </option>

                            <option
                                value="Belum Bayar"
                                @selected(request('status_pembayaran')=='Belum Bayar')>

                                Belum Bayar

                            </option>

                            <option
                                value="Lunas"
                                @selected(request('status_pembayaran')=='Lunas')>

                                Lunas

                            </option>

                            <option
                                value="Refund"
                                @selected(request('status_pembayaran')=='Refund')>

                                Refund

                            </option>

                        </select>

                    </div>

                    {{-- Tombol --}}

                    <div class="col-lg-2 d-flex align-items-end mb-3">

                        <button
                            type="submit"
                            class="btn btn-primary w-100 me-2">

                            <i class="fa-solid fa-magnifying-glass"></i>

                            Cari

                        </button>

                    </div>

                </div>

                <div class="text-end">

                    <a
                        href="{{ route('admin.pesanan.index') }}"
                        class="btn btn-outline-secondary">

                        <i class="fa-solid fa-arrow-rotate-left"></i>

                        Reset Filter

                    </a>

                </div>

            </form>

        </div>

    </div>

    {{-- Tabel Pesanan dimulai di Part 2 --}}
    <div class="card shadow">

    <div class="card-header bg-dark text-white">

        <h5 class="mb-0">

            <i class="fa-solid fa-table"></i>

            Daftar Pesanan

        </h5>

    </div>

    <div class="table-responsive">

        <table class="table table-hover align-middle mb-0">

            <thead class="table-dark">

                <tr>

                    <th width="60">

                        No

                    </th>

                    <th>

                        Nomor Pesanan

                    </th>

                    <th>

                        Customer

                    </th>

                    <th>

                        Meja

                    </th>

                    <th>

                        Total

                    </th>

                    <th>

                        Status

                    </th>

                    <th>

                        Pembayaran

                    </th>

                    <th>

                        Tanggal

                    </th>

                    <th width="180">

                        Aksi

                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($pesanans as $pesanan)

                <tr>

                    <td>

                        {{ $pesanans->firstItem() + $loop->index }}

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

                    <td class="fw-bold text-success">

                        Rp {{ number_format($pesanan->total_harga,0,',','.') }}

                    </td>

                    <td>

                        @switch($pesanan->status)

                            @case('Menunggu')

                                <span class="badge bg-warning text-dark">

                                    Menunggu

                                </span>

                            @break

                            @case('Diproses')

                                <span class="badge bg-primary">

                                    Diproses

                                </span>

                            @break

                            @case('Selesai')

                                <span class="badge bg-success">

                                    Selesai

                                </span>

                            @break

                            @default

                                <span class="badge bg-danger">

                                    Dibatalkan

                                </span>

                        @endswitch

                    </td>

                    <td>

                        @switch($pesanan->status_pembayaran)

                            @case('Belum Bayar')

                                <span class="badge bg-secondary">

                                    Belum Bayar

                                </span>

                            @break

                            @case('Lunas')

                                <span class="badge bg-success">

                                    Lunas

                                </span>

                            @break

                            @default

                                <span class="badge bg-danger">

                                    Refund

                                </span>

                        @endswitch

                    </td>

                    <td>

                        {{ optional($pesanan->tanggal_pesanan)->format('d M Y H:i') ?? '-' }}

                    </td>

                    {{-- Tombol Aksi dilanjutkan di Part 3 --}}
                    <td>

    <div class="btn-group" role="group">

        {{-- Detail --}}

        <a
            href="{{ route('admin.pesanan.show',$pesanan) }}"
            class="btn btn-info btn-sm"
            title="Detail Pesanan">

            <i class="fa-solid fa-eye"></i>

        </a>

        {{-- Edit --}}

        <a
            href="{{ route('admin.pesanan.edit',$pesanan) }}"
            class="btn btn-warning btn-sm"
            title="Edit Status">

            <i class="fa-solid fa-pen-to-square"></i>

        </a>

        {{-- Hapus --}}

        <form
            action="{{ route('admin.pesanan.destroy',$pesanan) }}"
            method="POST"
            class="d-inline"
            onsubmit="return confirm('Yakin ingin menghapus pesanan {{ $pesanan->nomor_pesanan }} ?')">

            @csrf

            @method('DELETE')

            <button
                type="submit"
                class="btn btn-danger btn-sm"
                title="Hapus Pesanan">

                <i class="fa-solid fa-trash"></i>

            </button>

        </form>

    </div>

</td>

</tr>

@empty

<tr>

    <td colspan="9">

        <div class="text-center py-5">

            <i
                class="fa-solid fa-cart-shopping fa-4x text-secondary mb-3">
            </i>

            <h4>

                Belum Ada Pesanan

            </h4>

            <p class="text-muted">

                Data pesanan customer akan muncul di sini.

            </p>

        </div>

    </td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>
    {{-- Pagination --}}

    @if($pesanans->hasPages())

        <div class="card shadow mt-4">

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col-md-6">

                        <small class="text-muted">

                            Menampilkan

                            <strong>

                                {{ $pesanans->firstItem() }}

                            </strong>

                            -

                            <strong>

                                {{ $pesanans->lastItem() }}

                            </strong>

                            dari

                            <strong>

                                {{ $pesanans->total() }}

                            </strong>

                            data pesanan.

                        </small>

                    </div>

                    <div class="col-md-6">

                        <div class="float-md-end">

                            {{ $pesanans->links() }}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endif

    {{-- Ringkasan Statistik --}}

    <div class="row mt-4">

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="card border-start border-warning border-4 shadow-sm">

                <div class="card-body">

                    <small class="text-muted">

                        Menunggu

                    </small>

                    <h3 class="fw-bold text-warning">

                        {{ $menunggu }}

                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="card border-start border-primary border-4 shadow-sm">

                <div class="card-body">

                    <small class="text-muted">

                        Diproses

                    </small>

                    <h3 class="fw-bold text-primary">

                        {{ $diproses }}

                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="card border-start border-success border-4 shadow-sm">

                <div class="card-body">

                    <small class="text-muted">

                        Selesai

                    </small>

                    <h3 class="fw-bold text-success">

                        {{ $selesai }}

                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="card border-start border-danger border-4 shadow-sm">

                <div class="card-body">

                    <small class="text-muted">

                        Dibatalkan

                    </small>

                    <h3 class="fw-bold text-danger">

                        {{ $dibatalkan }}

                    </h3>

                </div>

            </div>

        </div>

    </div>

    {{-- Footer Halaman --}}

    <div class="card mt-4 border-0 bg-light">

        <div class="card-body text-center">

            <small class="text-muted">

                <i class="fa-solid fa-circle-info"></i>

                Sistem Order Coffee Shop &copy; {{ date('Y') }}

                • Kelola seluruh transaksi customer dengan mudah.

            </small>

        </div>

    </div>

</div>

@endsection