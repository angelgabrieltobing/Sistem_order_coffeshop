@extends('layouts.admin')

@section('title','Detail Pesanan')

@section('page-title','Detail Pesanan')

@section('content')

<div class="container-fluid">

<div class="row">

<div class="col-lg-8">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h4 class="mb-0">

<i class="fa-solid fa-receipt"></i>

Detail Pesanan

</h4>

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>

<th width="250">

Nomor Pesanan

</th>

<td>

{{ $pesanan->nomor_pesanan }}

</td>

</tr>

<tr>

<th>

Nama Pelanggan

</th>

<td>

{{ $pesanan->nama_pelanggan }}

</td>

</tr>

<tr>

<th>

User

</th>

<td>

{{ $pesanan->user->name ?? '-' }}

</td>

</tr>

<tr>

<th>

Meja

</th>

<td>

{{ $pesanan->meja->nomor_meja ?? '-' }}

</td>

</tr>

<tr>

<th>

Tanggal Pesanan

</th>

<td>

{{ optional($pesanan->tanggal_pesanan)->format('d F Y H:i') }}

</td>

</tr>

<tr>

<th>

Metode Pembayaran

</th>

<td>

{{ $pesanan->metode_pembayaran }}

</td>

</tr>

<tr>

<th>

Status Pembayaran

</th>

<td>

@if($pesanan->status_pembayaran=="Lunas")

<span class="badge bg-success">

Lunas

</span>

@else

<span class="badge bg-danger">

Belum Bayar

</span>

@endif

</td>

</tr>

<tr>

<th>

Status Pesanan

</th>

<td>

@if($pesanan->status=="Menunggu")

<span class="badge bg-warning">

Menunggu

</span>

@elseif($pesanan->status=="Diproses")

<span class="badge bg-info">

Diproses

</span>

@elseif($pesanan->status=="Selesai")

<span class="badge bg-success">

Selesai

</span>

@else

<span class="badge bg-danger">

Dibatalkan

</span>

@endif

</td>

</tr>

<tr>

<th>

Catatan

</th>

<td>

{{ $pesanan->catatan ?: '-' }}

</td>

</tr>

</table>

</div>

</div>

</div>

<div class="col-lg-4">

<div class="card shadow">

<div class="card-header bg-success text-white">

Ringkasan Pembayaran

</div>

<div class="card-body">

<table class="table">

<tr>

<th>Total Item</th>

<td>

{{ $pesanan->total_item }}

</td>

</tr>

<tr>

<th>Total Harga</th>

<td>

Rp {{ number_format($pesanan->total_harga,0,',','.') }}

</td>

</tr>

<tr>

<th>Jumlah Bayar</th>

<td>

Rp {{ number_format($pesanan->jumlah_bayar,0,',','.') }}

</td>

</tr>

<tr>

<th>Kembalian</th>

<td>

Rp {{ number_format($pesanan->kembalian,0,',','.') }}

</td>

</tr>

</table>

<a
href="{{ route('admin.pesanan.edit',$pesanan) }}"
class="btn btn-warning w-100 mb-2">

<i class="fa-solid fa-pen"></i>

Update Status

</a>

<a
href="{{ route('admin.pesanan.index') }}"
class="btn btn-secondary w-100">

<i class="fa-solid fa-arrow-left"></i>

Kembali

</a>

</div>

</div>

</div>

</div>

<div class="card shadow mt-4">

<div class="card-header bg-dark text-white">

<h5 class="mb-0">

Item Pesanan

</h5>

</div>

<div class="card-body">

<div class="table-responsive">

<table class="table table-bordered align-middle">

<thead class="table-dark">

<tr>

<th>No</th>

<th>Menu</th>

<th>Harga</th>

<th>Jumlah</th>

<th>Subtotal</th>

<th>Catatan</th>

</tr>

</thead>

<tbody>

@forelse($pesanan->itemPesanans as $item)

<tr>

<td>

{{ $loop->iteration }}

</td>

<td>

{{ $item->menu->nama ?? '-' }}

</td>

<td>

Rp {{ number_format($item->harga,0,',','.') }}

</td>

<td>

{{ $item->jumlah }}

</td>

<td>

Rp {{ number_format($item->subtotal,0,',','.') }}

</td>

<td>

{{ $item->catatan ?: '-' }}

</td>

</tr>

@empty

<tr>

<td colspan="6" class="text-center">

Belum ada item pesanan.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

</div>

@endsection