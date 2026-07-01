@extends('layouts.admin')

@section('title', 'Update Pesanan')

@section('page-title', 'Update Status Pesanan')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-warning text-dark">

                    <h4 class="mb-0">

                        <i class="fa-solid fa-pen-to-square"></i>

                        Update Status Pesanan

                    </h4>

                </div>

                <div class="card-body">

                    @if(session('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                    @endif

                    @if($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form
                        action="{{ route('admin.pesanan.update',$pesanan) }}"
                        method="POST">

                        @csrf
                        @method('PUT')

                        {{-- Nomor Pesanan --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Nomor Pesanan

                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $pesanan->nomor_pesanan }}"
                                readonly>

                        </div>

                        {{-- Nama Customer --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Nama Customer

                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $pesanan->nama_pelanggan }}"
                                readonly>

                        </div>

                        {{-- Nomor Meja --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Nomor Meja

                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ optional($pesanan->meja)->nomor_meja ?? '-' }}"
                                readonly>

                        </div>

                        {{-- Tanggal Pesanan --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Tanggal Pesanan

                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ optional($pesanan->tanggal_pesanan)->format('d M Y H:i') }}"
                                readonly>

                        </div>

                        {{-- Total Harga --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Total Harga

                            </label>

                            <input
                                type="text"
                                class="form-control fw-bold text-success"
                                value="Rp {{ number_format($pesanan->total_harga,0,',','.') }}"
                                readonly>

                        </div>

                        {{-- Metode Pembayaran --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Metode Pembayaran

                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $pesanan->metode_pembayaran }}"
                                readonly>

                        </div>

                        {{-- Status Pesanan --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Status Pesanan

                            </label>

                            <select
                                name="status"
                                class="form-select"
                                required>

                                <option
                                    value="Menunggu"
                                    @selected(old('status',$pesanan->status)=='Menunggu')>

                                    Menunggu

                                </option>

                                <option
                                    value="Diproses"
                                    @selected(old('status',$pesanan->status)=='Diproses')>

                                    Diproses

                                </option>

                                <option
                                    value="Selesai"
                                    @selected(old('status',$pesanan->status)=='Selesai')>

                                    Selesai

                                </option>

                                <option
                                    value="Dibatalkan"
                                    @selected(old('status',$pesanan->status)=='Dibatalkan')>

                                    Dibatalkan

                                </option>

                            </select>

                        </div>

                        {{-- Status Pembayaran --}}

                        <div class="mb-4">

                            <label class="form-label">

                                Status Pembayaran

                            </label>

                            <select
                                name="status_pembayaran"
                                class="form-select"
                                required>

                                <option
                                    value="Belum Bayar"
                                    @selected(old('status_pembayaran',$pesanan->status_pembayaran)=='Belum Bayar')>

                                    Belum Bayar

                                </option>

                                <option
                                    value="Lunas"
                                    @selected(old('status_pembayaran',$pesanan->status_pembayaran)=='Lunas')>

                                    Lunas

                                </option>

                                <option
                                    value="Refund"
                                    @selected(old('status_pembayaran',$pesanan->status_pembayaran)=='Refund')>

                                    Refund

                                </option>

                            </select>

                        </div>

                        <div class="d-flex justify-content-between">

                            <a
                                href="{{ route('admin.pesanan.index') }}"
                                class="btn btn-secondary">

                                <i class="fa-solid fa-arrow-left"></i>

                                Kembali

                            </a>

                            <button
                                type="submit"
                                class="btn btn-success">

                                <i class="fa-solid fa-floppy-disk"></i>

                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection