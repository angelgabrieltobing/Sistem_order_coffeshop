@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">
        Checkout Pesanan
    </h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">

        <!-- Form Checkout -->
        <div class="col-md-7">

            <div class="card shadow-sm">

                <div class="card-header bg-primary text-white">
                    Data Pemesan
                </div>

                <div class="card-body">

                    <form action="{{ route('checkout.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Nama Customer
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ auth()->user()->name }}"
                                readonly>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Pilih Meja
                            </label>

                            <select
                                name="meja_id"
                                class="form-select"
                                required>

                                <option value="">
                                    -- Pilih Meja --
                                </option>

                                @foreach($mejas as $meja)

                                    <option value="{{ $meja->id }}">

                                        Meja {{ $meja->nomor_meja }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Catatan

                            </label>

                            <textarea
                                name="catatan"
                                rows="4"
                                class="form-control"
                                placeholder="Contoh: tanpa gula, es sedikit..."></textarea>

                        </div>

                </div>

            </div>

        </div>

        <!-- Ringkasan -->
        <div class="col-md-5">

            <div class="card shadow-sm">

                <div class="card-header bg-success text-white">

                    Ringkasan Pesanan

                </div>

                <div class="card-body">

                    <table class="table">

                        <thead>

                            <tr>

                                <th>Menu</th>

                                <th>Qty</th>

                                <th>Total</th>

                            </tr>

                        </thead>

                        <tbody>

                        @php
                            $grandTotal = 0;
                        @endphp

                        @foreach($cart->items as $item)

                            @php
                                $grandTotal += $item->subtotal;
                            @endphp

                            <tr>

                                <td>

                                    {{ $item->menu->nama }}

                                </td>

                                <td>

                                    {{ $item->qty }}

                                </td>

                                <td>

                                    Rp {{ number_format($item->subtotal,0,',','.') }}

                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                    <hr>

                    <h5 class="text-end">

                        Total :
                        <strong class="text-success">

                            Rp {{ number_format($grandTotal,0,',','.') }}

                        </strong>

                    </h5>

                    <button
                        type="submit"
                        class="btn btn-success w-100 mt-3">

                        Konfirmasi Pesanan

                    </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection