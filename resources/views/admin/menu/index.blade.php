@extends('layouts.customer')

@section('content')

<div class="container py-5">

<h2 class="mb-4">

Menu Coffee Shop

</h2>

<div class="row">

@foreach($menus as $menu)

<div class="col-lg-4 mb-4">

<div class="card h-100 shadow">

@if($menu->gambar)

<img src="{{ asset('storage/'.$menu->gambar) }}"
class="card-img-top"
style="height:220px;object-fit:cover;">

@else

<img src="https://via.placeholder.com/400x220"
class="card-img-top">

@endif

<div class="card-body">

<h4>{{ $menu->nama }}</h4>

<p>{{ $menu->kategori }}</p>

<p>{{ $menu->deskripsi }}</p>

<h5 class="text-success">

Rp {{ number_format($menu->harga,0,',','.') }}

</h5>

<form
method="POST"
action="{{ route('cart.add',$menu) }}">

@csrf

<button
class="btn btn-success w-100">

Tambah ke Keranjang

</button>

</form>

</div>

</div>

</div>

@endforeach

</div>

<div class="mt-4">

{{ $menus->links() }}

</div>

</div>

@endsection