@extends('layouts.customer')

@section('title', 'Detail Pesanan')

@section('content')

<div class="container py-5">

    <div class="row mb-4">

        <div class="col">

            <h2 class="fw-bold">

                <i class="fa-solid fa-file-invoice"></i>

                Detail Pesanan

            </h2>

            <p class="text-muted">

                Informasi lengkap pesanan Anda.

            </p>

        </div>

    </div>

    <div class="card shadow mb-4">

        <div class="card-header bg-dark text-white">

            <h5 class="mb-0">

                Informasi Pesanan

            </h5>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <strong>Nomor Pesanan</strong>

                    <br>

                    {{ $pesanan->nomor_pesanan }}

                </div>

                <div class="col-md-6 mb-3">

                    <strong>Tanggal</strong>

                    <br>

                    {{ optional($pesanan->tanggal_pesanan)->format('d M Y H:i') }}

                </div>

                <div class="col-md-6 mb-3">

                    <strong>Nama Customer</strong>

                    <br>

                    {{ $pesanan->nama_pelanggan }}

                </div>

                <div class="col-md-6 mb-3">

                    <strong>Nomor Meja</strong>

                    <br>

                    {{ optional($pesanan->meja)->nomor_meja ?? '-' }}

                </div>

                <div class="col-md-6 mb-3">

                    <strong>Status Pesanan</strong>

                    <br>

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

                </div>

                <div class="col-md-6 mb-3">

                    <strong>Status Pembayaran</strong>

                    <br>

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

                </div>

                <div class="col-md-6 mb-3">

                    <strong>Metode Pembayaran</strong>

                    <br>

                    {{ $pesanan->metode_pembayaran }}

                </div>

                <div class="col-md-6 mb-3">

                    <strong>Total Harga</strong>

                    <br>

                    <span class="fw-bold text-success">

                        Rp {{ number_format($pesanan->total_harga,0,',','.') }}

                    </span>

                </div>

                @if($pesanan->catatan)

                    <div class="col-12">

                        <strong>Catatan</strong>

                        <br>

                        {{ $pesanan->catatan }}

                    </div>

                @endif

            </div>

        </div>

    </div>

    <div class="card shadow">

        <div class="card-header bg-success text-white">

            <h5 class="mb-0">

                Daftar Menu

            </h5>

        </div>

        <div class="table-responsive">

            <table class="table table-bordered align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>No</th>

                        <th>Menu</th>

                        <th>Qty</th>

                        <th>Harga</th>

                        <th>Subtotal</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($pesanan->itemPesanans as $item)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                {{ optional($item->menu)->nama ?? 'Menu telah dihapus' }}

                            </td>

                            <td>

                                {{ $item->qty }}

                            </td>

                            <td>

                                Rp {{ number_format($item->harga,0,',','.') }}

                            </td>

                            <td>

                                Rp {{ number_format($item->subtotal,0,',','.') }}

                            </td>

                        </tr>

                    @endforeach

                </tbody>

                <tfoot>

                    <tr>

                        <th colspan="4" class="text-end">

                            Total

                        </th>

                        <th>

                            Rp {{ number_format($pesanan->total_harga,0,',','.') }}

                        </th>

                    </tr>

                </tfoot>

            </table>

        </div>

    </div>

    <div class="mt-4 d-flex justify-content-between">

        <a
            href="{{ route('customer.pesanan.index') }}"
            class="btn btn-secondary">

            <i class="fa-solid fa-arrow-left"></i>

            Kembali

        </a>

        <a
            href="{{ route('customer.pesanan.receipt',$pesanan) }}"
            class="btn btn-success">

            <i class="fa-solid fa-receipt"></i>

            Lihat Struk

        </a>

    </div>

</div>

@endsection