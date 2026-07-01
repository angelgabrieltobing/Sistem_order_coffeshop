@extends('layouts.customer')

@section('title', 'Checkout')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">
        Checkout Pesanan
    </h2>

    {{-- Pesan Error --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Validasi Error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('checkout.store') }}" method="POST">

        @csrf

        <div class="row">

            {{-- FORM CUSTOMER --}}
            <div class="col-lg-7">

                <div class="card shadow-sm mb-4">

                    <div class="card-header">
                        <h5>Data Pelanggan</h5>
                    </div>

                    <div class="card-body">

                        <div class="mb-3">

                            <label class="form-label">
                                Nama Pelanggan
                            </label>

                            <input
                                type="text"
                                name="nama_pelanggan"
                                class="form-control"
                                value="{{ old('nama_pelanggan', auth()->user()->name) }}"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Metode Pembayaran
                            </label>

                            <select
                                name="metode_pembayaran"
                                class="form-select"
                                required>

                                <option value="">-- Pilih Metode Pembayaran --</option>

                                <option value="Tunai"
                                    {{ old('metode_pembayaran') == 'Tunai' ? 'selected' : '' }}>
                                    Tunai
                                </option>

                                <option value="Debit"
                                    {{ old('metode_pembayaran') == 'Debit' ? 'selected' : '' }}>
                                    Debit
                                </option>

                                <option value="Kredit"
                                    {{ old('metode_pembayaran') == 'Kredit' ? 'selected' : '' }}>
                                    Kredit
                                </option>

                                <option value="QRIS"
                                    {{ old('metode_pembayaran') == 'QRIS' ? 'selected' : '' }}>
                                    QRIS
                                </option>

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Catatan
                            </label>

                            <textarea
                                name="catatan"
                                rows="3"
                                class="form-control">{{ old('catatan') }}</textarea>

                        </div>

                    </div>

                </div>

            </div>

            {{-- RINGKASAN --}}
            <div class="col-lg-5">

                <div class="card shadow-sm">

                    <div class="card-header">
                        <h5>Ringkasan Pesanan</h5>
                    </div>

                    <div class="card-body">

                        @foreach($cart->items as $item)

                            <div class="d-flex justify-content-between mb-3">

                                <div>

                                    <strong>
                                        {{ $item->menu->nama }}
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

                            <strong>Total</strong>

                            <strong>

                                Rp {{ number_format($cart->total,0,',','.') }}

                            </strong>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-success w-100 mt-4">

                            Buat Pesanan

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection