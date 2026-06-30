@extends('layouts.app')

@section('title', 'Menu Coffee Shop')

@section('content')

<div class="container py-5">

    <div class="row mb-5">

        <div class="col-md-12 text-center">

            <h2 class="fw-bold">

                ☕ Coffee Shop Menu

            </h2>

            <p class="text-muted">

                Pilih menu favoritmu dan tambahkan ke keranjang.

            </p>

        </div>

    </div>

    <div class="row">

        @forelse($menus as $menu)

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card shadow h-100 border-0">

                @if($menu->gambar)

                    <img
                        src="{{ asset('storage/'.$menu->gambar) }}"
                        class="card-img-top"
                        style="height:250px;object-fit:cover;">

                @else

                    <img
                        src="https://via.placeholder.com/500x300?text=Coffee+Menu"
                        class="card-img-top">

                @endif

                <div class="card-body">

                    <span class="badge bg-warning text-dark mb-2">

                        {{ $menu->kategori }}

                    </span>

                    <h4 class="fw-bold">

                        {{ $menu->nama }}

                    </h4>

                    <p class="text-muted">

                        {{ $menu->deskripsi }}

                    </p>

                    <h5 class="text-success fw-bold">

                        Rp {{ number_format($menu->harga,0,',','.') }}

                    </h5>

                </div>

                <div class="card-footer bg-white border-0">

                    <form action="#" method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-dark w-100">

                            🛒 Tambah ke Keranjang

                        </button>

                    </form>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="alert alert-warning text-center">

                Belum ada menu yang tersedia.

            </div>

        </div>

        @endforelse

    </div>

</div>

@endsection