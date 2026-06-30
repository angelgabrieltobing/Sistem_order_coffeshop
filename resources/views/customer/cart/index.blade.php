@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')

<div class="container py-5">

    <h2 class="mb-4 fw-bold">
        🛒 Keranjang Belanja
    </h2>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    @if($cart->items->count())

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>Menu</th>

                        <th width="120">Harga</th>

                        <th width="140">Qty</th>

                        <th width="150">Subtotal</th>

                        <th width="100">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @foreach($cart->items as $item)

                    <tr>

                        <td>

                            <strong>

                                {{ $item->menu->nama }}

                            </strong>

                        </td>

                        <td>

                            Rp {{ number_format($item->harga,0,',','.') }}

                        </td>

                        <td>

                            <form
                                action="{{ route('cart.update',$item->id) }}"
                                method="POST">

                                @csrf

                                <div class="input-group">

                                    <input
                                        type="number"
                                        name="qty"
                                        value="{{ $item->qty }}"
                                        min="1"
                                        class="form-control">

                                    <button
                                        class="btn btn-warning">

                                        Update

                                    </button>

                                </div>

                            </form>

                        </td>

                        <td>

                            Rp {{ number_format($item->subtotal,0,',','.') }}

                        </td>

                        <td>

                            <form
                                action="{{ route('cart.remove',$item->id) }}"
                                method="POST">

                                @csrf

                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

            <hr>

            <div class="d-flex justify-content-between">

                <h4>

                    Total :

                </h4>

                <h4 class="text-success">

                    Rp {{ number_format($cart->total,0,',','.') }}

                </h4>

            </div>

            <div class="mt-4 d-flex gap-2">

                <form
                    action="{{ route('cart.clear') }}"
                    method="POST">

                    @csrf

                    @method('DELETE')

                    <button
                        class="btn btn-danger">

                        Kosongkan Keranjang

                    </button>

                </form>

                <a
                    href="{{ route('checkout.index') }}"
                    class="btn btn-success">

                    Checkout

                </a>

            </div>

        </div>

    </div>

    @else

    <div class="alert alert-warning">

        Keranjang masih kosong.

    </div>

    <a
        href="{{ route('menu') }}"
        class="btn btn-primary">

        Kembali ke Menu

    </a>

    @endif

</div>

@endsection