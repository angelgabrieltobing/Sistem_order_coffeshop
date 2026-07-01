@extends('layouts.customer')

@section('title', 'Struk Pembayaran')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow border-0" id="receipt">

                <div class="card-body">

                    <div class="text-center mb-4">

                        <h2 class="fw-bold text-dark">

                            ☕

                            COFFEE SHOP

                        </h2>

                        <p class="mb-1">

                            Sistem Pemesanan Coffee Shop

                        </p>

                        <small class="text-muted">

                            Terima kasih telah melakukan pemesanan.

                        </small>

                    </div>

                    <hr>

                    <table class="table table-borderless table-sm">

                        <tr>

                            <th width="170">

                                Nomor Pesanan

                            </th>

                            <td>

                                {{ $pesanan->nomor_pesanan }}

                            </td>

                        </tr>

                        <tr>

                            <th>

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

                                {{ $pesanan->metode_pembayaran }}

                            </td>

                        </tr>

                    </table>

                    <hr>

                    <h5 class="fw-bold mb-3">

                        Daftar Menu

                    </h5>

                    <table class="table table-bordered align-middle">

                        <thead class="table-light">

                            <tr>

                                <th>No</th>

                                <th>Menu</th>

                                <th class="text-center">Qty</th>

                                <th class="text-end">Harga</th>

                                <th class="text-end">Subtotal</th>

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

                                    <td class="text-center">

                                        {{ $item->qty }}

                                    </td>

                                    <td class="text-end">

                                        Rp {{ number_format($item->harga,0,',','.') }}

                                    </td>

                                    <td class="text-end">

                                        Rp {{ number_format($item->subtotal,0,',','.') }}

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="text-center text-muted">

                                        Tidak ada item pesanan.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                        <tfoot>

                            <tr class="table-light">

                                <th colspan="4" class="text-end">

                                    Total

                                </th>

                                <th class="text-end">

                                    Rp {{ number_format($pesanan->total_harga,0,',','.') }}

                                </th>

                            </tr>

                        </tfoot>

                    </table>

                    <hr>

                    <div class="row">

                        <div class="col-6">

                            <strong>Status Pesanan</strong>

                            <br>

                            @if($pesanan->status=='Menunggu')

                                <span class="badge bg-warning text-dark">

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

                        </div>

                        <div class="col-6 text-end">

                            <strong>Status Pembayaran</strong>

                            <br>

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

                        </div>

                    </div>

                    @if($pesanan->catatan)

                        <hr>

                        <strong>

                            Catatan

                        </strong>

                        <p class="mb-0">

                            {{ $pesanan->catatan }}

                        </p>

                    @endif

                    <hr>

                    <div class="text-center">

                        <h5>

                            Terima Kasih ☕

                        </h5>

                        <small class="text-muted">

                            Simpan struk ini sebagai bukti transaksi.

                        </small>

                    </div>

                </div>

            </div>

            <div class="mt-4 d-flex justify-content-between">

                <a
                    href="{{ route('customer.pesanan.show',$pesanan) }}"
                    class="btn btn-secondary">

                    <i class="fa-solid fa-arrow-left"></i>

                    Kembali

                </a>

                <button
                    onclick="window.print()"
                    class="btn btn-success">

                    <i class="fa-solid fa-print"></i>

                    Cetak Struk

                </button>

            </div>

        </div>

    </div>

</div>

@endsection