@extends('layouts.customer')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">
        Daftar Menu Coffee Shop
    </h2>

    <div class="row">

        @forelse($menus as $menu)

            <div class="col-md-4 mb-4">

                <div class="card h-100 shadow-sm">

                    @if($menu->gambar)

                        <img src="{{ asset('storage/'.$menu->gambar) }}"
                             class="card-img-top"
                             style="height:220px;object-fit:cover;">

                    @endif

                    <div class="card-body">

                        <h5>{{ $menu->nama }}</h5>

                        <p class="text-muted">
                            {{ $menu->kategori }}
                        </p>

                        <h5 class="text-success">
                            Rp {{ number_format($menu->harga,0,',','.') }}
                        </h5>

                        <p>
                            {{ $menu->deskripsi }}
                        </p>

                    </div>

                    <div class="card-footer bg-white">

                        <form action="{{ route('cart.add',$menu->id) }}" method="POST">

                            @csrf

                            <button class="btn btn-primary w-100">

                                Tambah ke Keranjang

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-warning">

                    Menu belum tersedia.

                </div>

            </div>

        @endforelse

    </div>

    <div class="mt-4">

        {{ $menus->links() }}

    </div>

</div>

@endsection