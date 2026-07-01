@extends('layouts.admin')

@section('title', 'Update Pesanan')

@section('page-title', 'Update Status Pesanan')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-warning">

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

                    <form action="{{ route('admin.pesanan.update', $pesanan) }}" method="POST">

                        @csrf
                        @method('PUT')

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

                        <div class="mb-3">

                            <label class="form-label">

                                Nama Pelanggan

                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $pesanan->nama_pelanggan }}"
                                readonly>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Total Harga

                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="Rp {{ number_format($pesanan->total_harga,0,',','.') }}"
                                readonly>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Status Pesanan

                            </label>

                            <select
                                name="status"
                                class="form-select"
                                required>

                                <option value="Menunggu"
                                    @selected($pesanan->status=='Menunggu')>

                                    Menunggu

                                </option>

                                <option value="Diproses"
                                    @selected($pesanan->status=='Diproses')>

                                    Diproses

                                </option>

                                <option value="Selesai"
                                    @selected($pesanan->status=='Selesai')>

                                    Selesai

                                </option>

                                <option value="Dibatalkan"
                                    @selected($pesanan->status=='Dibatalkan')>

                                    Dibatalkan

                                </option>

                            </select>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">

                                Status Pembayaran

                            </label>

                            <select
                                name="status_pembayaran"
                                class="form-select"
                                required>

                                <option value="Belum Bayar"
                                    @selected($pesanan->status_pembayaran=='Belum Bayar')>

                                    Belum Bayar

                                </option>

                                <option value="Lunas"
                                    @selected($pesanan->status_pembayaran=='Lunas')>

                                    Lunas

                                </option>

                                <option value="Refund"
                                    @selected($pesanan->status_pembayaran=='Refund')>

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

                                Update Pesanan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection