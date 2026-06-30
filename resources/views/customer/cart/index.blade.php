@extends('layouts.customer')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">
        <i class="fa-solid fa-cart-shopping"></i>
        Keranjang Belanja
    </h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($cart->items->count())

    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>Gambar</th>

                            <th>Menu</th>

                            <th>Harga</th>

                            <th width="170">Qty</th>

                            <th>Subtotal</th>

                            <th width="120">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    @foreach($cart->items as $item)

                    <tr>

                        <td width="110">

                            @if($item->menu->gambar)

                            <img
                                src="{{ asset('storage/'.$item->menu->gambar) }}"
                                class="img-thumbnail"
                                style="width:90px;height:90px;object-fit:cover;">

                            @else

                            <img
                                src="https://via.placeholder.com/90"
                                class="img-thumbnail">

                            @endif

                        </td>

                        <td>

                            <strong>

                                {{ $item->menu->nama }}

                            </strong>

                            <br>

                            <small>

                                {{ $item->menu->kategori }}

                            </small>

                        </td>

                        <td>

                            Rp {{ number_format($item->harga,0,',','.') }}

                        </td>

                        <td>

                            <form
                                method="POST"
                                action="{{ route('cart.update',$item->menu) }}">

                                @csrf

                                <div class="input-group">

                                    <input
                                        type="number"
                                        name="qty"
                                        class="form-control"
                                        min="1"
                                        value="{{ $item->qty }}">

                                    <button
                                        class="btn btn-primary">

                                        Update

                                    </button>

                                </div>

                            </form>

                        </td>

                        <td>

                            <strong>

                                Rp {{ number_format($item->subtotal,0,',','.') }}

                            </strong>

                        </td>

                        <td>

                            <form
                                method="POST"
                                action="{{ route('cart.remove',$item->menu) }}">

                                @csrf

                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm">

                                    <i class="fa fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="row mt-4">

        <div class="col-md-6">

            <form
                method="POST"
                action="{{ route('cart.clear') }}">

                @csrf

                @method('DELETE')

                <button
                    class="btn btn-outline-danger">

                    Kosongkan Keranjang

                </button>

            </form>

        </div>

        <div class="col-md-6 text-end">

            <h3>

                Total :

                <span class="text-success">

                    Rp {{ number_format($cart->total,0,',','.') }}

                </span>

            </h3>

            <a
                href="{{ route('checkout.index') }}"
                class="btn btn-success btn-lg">

                Checkout

            </a>

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