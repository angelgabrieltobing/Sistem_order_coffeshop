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

        <div class="alert alert-danger">

            {{ session('error') }}

        </div>

    @endif

    {{-- Pesan Success --}}
    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    {{-- Validasi --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('checkout.store') }}" method="POST">

        @csrf

        <div class="row">

            <div class="col-lg-7">

                <div class="card shadow-sm">

                    <div class="card-header">

                        <h5 class="mb-0">

                            Data Customer

                        </h5>

                    </div>

                    <div class="card-body">

                        {{-- Nama --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Nama Customer

                            </label>

                            <input
                                type="text"
                                name="nama_pelanggan"
                                value="{{ old('nama_pelanggan', auth()->user()->name) }}"
                                class="form-control @error('nama_pelanggan') is-invalid @enderror"
                                required>

                            @error('nama_pelanggan')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        {{-- Pilih Meja --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Pilih Meja

                            </label>

                            <select
                                name="meja_id"
                                class="form-select @error('meja_id') is-invalid @enderror"
                                required>

                                <option value="">

                                    -- Pilih Meja --

                                </option>

                                @foreach($mejas as $meja)

                                    <option
                                        value="{{ $meja->id }}"
                                        @selected(old('meja_id') == $meja->id)>

                                        {{ $meja->nomor_meja }}

                                        ({{ $meja->kapasitas }} Orang)

                                    </option>

                                @endforeach

                            </select>

                            @error('meja_id')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        {{-- Pembayaran --}}

                        <div class="mb-3">

                            <label class="form-label">

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

                            </select>

                            @error('metode_pembayaran')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        {{-- Catatan --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Catatan

                            </label>

                            <textarea
                                name="catatan"
                                rows="4"
                                class="form-control">{{ old('catatan') }}</textarea>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Ringkasan --}}

            <div class="col-lg-5">

                <div class="card shadow-sm">

                    <div class="card-header">

                        <h5 class="mb-0">

                            Ringkasan Pesanan

                        </h5>

                    </div>

                    <div class="card-body">

                        @foreach($cart->items as $item)

                            <div class="d-flex justify-content-between mb-3">

                                <div>

                                    <strong>

                                        {{ optional($item->menu)->nama ?? 'Menu telah dihapus' }}

                                    </strong>

                                    <br>

                                    Qty : {{ $item->qty }}

                                </div>

                                <div>

                                    Rp {{ number_format($item->subtotal,0,',','.') }}

                                </div>

                            </div>

                        @endforeach

                        <hr>

                        <div class="d-flex justify-content-between">

                            <h5>

                                Total

                            </h5>

                            <h5 class="text-success">

                                Rp {{ number_format($cart->total,0,',','.') }}

                            </h5>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-success w-100 mt-4">

                            <i class="fa-solid fa-check"></i>

                            Buat Pesanan

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection