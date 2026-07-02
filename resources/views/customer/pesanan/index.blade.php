@extends('layouts.customer')

@section('title', 'Riwayat Pesanan')

@section('content')

<div class="container py-5">

    <div class="row mb-4">

        <div class="col">

            <h2 class="fw-bold">

                <i class="fa-solid fa-receipt"></i>

                Riwayat Pesanan Saya

            </h2>

            <p class="text-muted">

                Semua pesanan yang pernah Anda buat.

            </p>

        </div>

    </div>

    {{-- Success --}}
    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    {{-- Tidak ada pesanan --}}
    @if($pesanans->isEmpty())

        <div class="card shadow">

            <div class="card-body text-center py-5">

                <i class="fa-solid fa-cart-shopping fa-4x text-secondary mb-3"></i>

                <h4>

                    Belum Ada Riwayat Pesanan

                </h4>

                <p class="text-muted">

                    Silakan lakukan pemesanan terlebih dahulu.

                </p>

                <a
                    href="{{ route('menu') }}"
                    class="btn btn-success">

                    <i class="fa-solid fa-mug-hot"></i>

                    Lihat Menu

                </a>

            </div>

        </div>

    @else

        <div class="card shadow">

            <div class="card-header bg-dark text-white">

                <h5 class="mb-0">

                    Daftar Riwayat Pesanan

                </h5>

            </div>

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">

                        <tr>

                            <th>No</th>

                            <th>Nomor Pesanan</th>

                            <th>Tanggal</th>

                            <th>Meja</th>

                            <th>Total</th>

                            <th>Status</th>

                            <th>Pembayaran</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($pesanans as $pesanan)

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

                                    {{ optional($pesanan->tanggal_pesanan)->format('d M Y H:i') ?? '-' }}

                                </td>

                                <td>

                                    {{ optional($pesanan->meja)->nomor_meja ?? '-' }}

                                </td>

                                <td>

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

                                    <a
                                        href="{{ route('customer.pesanan.show',$pesanan) }}"
                                        class="btn btn-primary btn-sm">

                                        <i class="fa-solid fa-eye"></i>

                                        Detail

                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

        <div class="mt-4">

            {{ $pesanans->links() }}

        </div>

    @endif

</div>

@endsection