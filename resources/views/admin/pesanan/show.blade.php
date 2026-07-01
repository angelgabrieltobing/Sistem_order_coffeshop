@extends('layouts.customer')

@section('title', 'Detail Pesanan')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card shadow border-0">

                <div class="card-header bg-dark text-white">

                    <div class="d-flex justify-content-between align-items-center">

                        <h4 class="mb-0">

                            <i class="fa-solid fa-receipt"></i>

                            Detail Pesanan

                        </h4>

                        <span class="badge bg-warning text-dark">

                            {{ $pesanan->nomor_pesanan }}

                        </span>

                    </div>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">

                            <table class="table table-borderless">

                                <tr>

                                    <th width="180">

                                        Nama Customer

                                    </th>

                                    <td>

                                        {{ $pesanan->nama_pelanggan }}

                                    </td>

                                </tr>

                                <tr>

                                    <th>

                                        Nomor Meja

                                    </th>

                                    <td>

                                        {{ optional($pesanan->meja)->nomor_meja ?? '-' }}

                                    </td>

                                </tr>

                                <tr>

                                    <th>

                                        Tanggal Pesanan

                                    </th>

                                    <td>

                                        {{ optional($pesanan->tanggal_pesanan)->format('d M Y H:i') ?? '-' }}

                                    </td>

                                </tr>

                                <tr>

                                    <th>

                                        Metode Pembayaran

                                    </th>

                                    <td>

                                        {{ $pesanan->metode_pembayaran ?? '-' }}

                                    </td>

                                </tr>

                            </table>

                        </div>

                        <div class="col-md-6">

                            <table class="table table-borderless">

                                <tr>

                                    <th width="180">

                                        Status Pesanan

                                    </th>

                                    <td>

                                        @if($pesanan->status == 'Menunggu')

                                            <span class="badge bg-warning">

                                                Menunggu

                                            </span>

                                        @elseif($pesanan->status == 'Diproses')

                                            <span class="badge bg-primary">

                                                Diproses

                                            </span>

                                        @elseif($pesanan->status == 'Selesai')

                                            <span class="badge bg-success">

                                                Selesai

                                            </span>

                                        @else

                                            <span class="badge bg-danger">

                                                Dibatalkan

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                                <tr>

                                    <th>

                                        Status Pembayaran

                                    </th>

                                    <td>

                                        @if($pesanan->status_pembayaran == 'Belum Bayar')

                                            <span class="badge bg-secondary">

                                                Belum Bayar

                                            </span>

                                        @elseif($pesanan->status_pembayaran == 'Lunas')

                                            <span class="badge bg-success">

                                                Lunas

                                            </span>

                                        @elseif($pesanan->status_pembayaran == 'Refund')

                                            <span class="badge bg-danger">

                                                Refund

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                                <tr>

                                    <th>

                                        Catatan

                                    </th>

                                    <td>

                                        {{ $pesanan->catatan ?: '-' }}

                                    </td>

                                </tr>

                            </table>

                        </div>

                    </div>

                    <hr>

                    <h5 class="fw-bold mb-3">

                        Daftar Menu

                    </h5>

                    <div class="table-responsive">

                        <table class="table table-bordered align-middle">

                            <thead class="table-light">

                                <tr>

                                    <th width="60">

                                        No

                                    </th>

                                    <th>

                                        Menu

                                    </th>

                                    <th width="90">

                                        Qty

                                    </th>

                                    <th width="170">

                                        Harga

                                    </th>

                                    <th width="180">

                                        Subtotal

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($pesanan->itemPesanans as $item)

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

                                @empty

                                    <tr>

                                        <td
                                            colspan="5"
                                            class="text-center text-muted">

                                            Belum ada item pesanan.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                            <tfoot>

                                <tr class="table-light">

                                    <th colspan="4" class="text-end">

                                        Total Bayar

                                    </th>

                                    <th>

                                        Rp {{ number_format($pesanan->total_harga,0,',','.') }}

                                    </th>

                                </tr>

                            </tfoot>

                        </table>

                    </div>

                </div>

                <div class="card-footer d-flex justify-content-between">

                    <a
                        href="{{ route('customer.pesanan.index') }}"
                        class="btn btn-secondary">

                        <i class="fa-solid fa-arrow-left"></i>

                        Kembali

                    </a>

                    <a
                        href="{{ route('customer.pesanan.receipt', $pesanan) }}"
                        class="btn btn-success">

                        <i class="fa-solid fa-receipt"></i>

                        Lihat Struk

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection