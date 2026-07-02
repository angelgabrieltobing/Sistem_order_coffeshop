@extends('layouts.customer')

@section('title', 'Checkout')

@section('content')

<div class="container py-5">

    <div class="row mb-4">

        <div class="col">

            <h2 class="fw-bold">

                <i class="fa-solid fa-credit-card"></i>

                Checkout Pesanan

            </h2>

            <p class="text-muted">

                Lengkapi data berikut sebelum membuat pesanan.

            </p>

        </div>

    </div>

    {{-- Pesan Error --}}
    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            <i class="fa-solid fa-exclamation-circle"></i>

            {{ session('error') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

        </div>

    @endif

    {{-- Pesan Success --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">

            <i class="fa-solid fa-check-circle"></i>

            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

        </div>

    @endif

    {{-- Validasi --}}
    @if($errors->any())

        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            <i class="fa-solid fa-exclamation-triangle"></i>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

        </div>

    @endif

    <form action="{{ route('checkout.store') }}" method="POST">

        @csrf

        <div class="row">

            <div class="col-lg-7">

                <div class="card shadow-sm">

                    <div class="card-header bg-primary text-white">

                        <h5 class="mb-0">

                            <i class="fa-solid fa-user"></i>

                            Data Customer

                        </h5>

                    </div>

                    <div class="card-body">

                        {{-- Nama --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                <i class="fa-solid fa-user"></i>

                                Nama Customer

                            </label>

                            <input
                                type="text"
                                name="nama_pelanggan"
                                value="{{ old('nama_pelanggan', auth()->user()->name) }}"
                                class="form-control @error('nama_pelanggan') is-invalid @enderror"
                                required
                                placeholder="Masukkan nama Anda">

                            @error('nama_pelanggan')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        {{-- Pilih Meja --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                <i class="fa-solid fa-chair"></i>

                                Pilih Meja

                            </label>

                            <select
                                name="meja_id"
                                class="form-select @error('meja_id') is-invalid @enderror"
                                required>

                                <option value="">

                                    -- Pilih Meja --

                                </option>

                                {{-- PERBAIKAN: Tampilkan data meja --}}
                                @forelse($mejas as $meja)

                                    <option
                                        value="{{ $meja->id }}"
                                        @selected(old('meja_id') == $meja->id)>

                                        Meja {{ $meja->nomor_meja }}

                                        (Kapasitas: {{ $meja->kapasitas ?? 4 }} Orang)

                                    </option>

                                @empty

                                    <option value="" disabled>

                                        -- Tidak ada meja tersedia --

                                    </option>

                                @endforelse

                            </select>

                            @error('meja_id')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                            {{-- PERBAIKAN: Notifikasi jika meja kosong --}}
                            @if($mejas->isEmpty())

                                <small class="text-danger">

                                    <i class="fa-solid fa-exclamation-circle"></i>

                                    Tidak ada meja tersedia. Silakan hubungi admin.

                                </small>

                            @endif

                        </div>

                        {{-- Pembayaran --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                <i class="fa-solid fa-money-bill-wave"></i>

                                Metode Pembayaran

                            </label>

                            <select
                                name="metode_pembayaran"
                                class="form-select @error('metode_pembayaran') is-invalid @enderror"
                                required>

                                <option value="">

                                    -- Pilih Metode --

                                </option>

                                <option
                                    value="Tunai"
                                    @selected(old('metode_pembayaran')=='Tunai')>

                                    Tunai

                                </option>

                                <option
                                    value="Debit"
                                    @selected(old('metode_pembayaran')=='Debit')>

                                    Debit

                                </option>

                                <option
                                    value="Kredit"
                                    @selected(old('metode_pembayaran')=='Kredit')>

                                    Kredit

                                </option>

                                <option
                                    value="QRIS"
                                    @selected(old('metode_pembayaran')=='QRIS')>

                                    QRIS

                                </option>

                                <option
                                    value="E-Wallet"
                                    @selected(old('metode_pembayaran')=='E-Wallet')>

                                    E-Wallet (OVO, GoPay, DANA)

                                </option>

                            </select>

                            @error('metode_pembayaran')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        {{-- Catatan --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                <i class="fa-solid fa-pen"></i>

                                Catatan

                            </label>

                            <textarea
                                name="catatan"
                                rows="4"
                                class="form-control"
                                placeholder="Tambahkan catatan untuk pesanan Anda...">{{ old('catatan') }}</textarea>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Ringkasan --}}

            <div class="col-lg-5">

                <div class="card shadow-sm">

                    <div class="card-header bg-success text-white">

                        <h5 class="mb-0">

                            <i class="fa-solid fa-receipt"></i>

                            Ringkasan Pesanan

                        </h5>

                    </div>

                    <div class="card-body">

                        {{-- PERBAIKAN: Cek apakah cart memiliki items --}}
                        @if(isset($cart) && $cart->items && $cart->items->count() > 0)

                            @foreach($cart->items as $item)

                                <div class="d-flex justify-content-between mb-3 pb-2 border-bottom">

                                    <div>

                                        <strong>

                                            {{ optional($item->menu)->nama ?? 'Menu telah dihapus' }}

                                        </strong>

                                        <br>

                                        <small class="text-muted">

                                            <i class="fa-solid fa-cubes"></i>

                                            Qty : {{ $item->qty }}

                                        </small>

                                    </div>

                                    <div class="text-end">

                                        <span class="fw-bold">

                                            Rp {{ number_format($item->subtotal,0,',','.') }}

                                        </span>

                                    </div>

                                </div>

                            @endforeach

                            <hr>

                            <div class="d-flex justify-content-between">

                                <h5 class="fw-bold">

                                    <i class="fa-solid fa-calculator"></i>

                                    Total

                                </h5>

                                <h5 class="text-success fw-bold">

                                    Rp {{ number_format($cart->total ?? 0,0,',','.') }}

                                </h5>

                            </div>

                            <button
                                type="submit"
                                class="btn btn-success w-100 mt-4 py-2">

                                <i class="fa-solid fa-check"></i>

                                Buat Pesanan

                            </button>

                        @else

                            <div class="text-center py-4">

                                <i class="fa-solid fa-cart-empty fa-3x text-muted"></i>

                                <p class="text-muted mt-2">

                                    Keranjang kosong. Silakan tambahkan menu terlebih dahulu.

                                </p>

                                <a href="{{ url('/menu') }}" class="btn btn-primary">

                                    <i class="fa-solid fa-utensils"></i>

                                    Lihat Menu

                                </a>

                            </div>

                        @endif

                    </div>

                </div>

                {{-- Tombol Kembali --}}

                <div class="mt-3">

                    <a href="{{ url('/cart') }}" class="btn btn-outline-secondary w-100">

                        <i class="fa-solid fa-arrow-left"></i>

                        Kembali ke Keranjang

                    </a>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection