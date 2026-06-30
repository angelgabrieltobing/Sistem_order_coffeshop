@extends('layouts.admin')

@section('title','Detail User')

@section('page-title','Detail User')

@section('content')

<div class="container-fluid">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow">

<div class="card-header bg-info text-white">

<h4 class="mb-0">

<i class="fa-solid fa-user"></i>

Detail User

</h4>

</div>

<div class="card-body">

<div class="text-center mb-4">

<img
src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=8b5e34&color=fff&size=180"
class="rounded-circle shadow">

</div>

<table class="table table-bordered">

<tr>

<th width="220">

ID User

</th>

<td>

{{ $user->id }}

</td>

</tr>

<tr>

<th>

Nama Lengkap

</th>

<td>

{{ $user->name }}

</td>

</tr>

<tr>

<th>

Email

</th>

<td>

{{ $user->email }}

</td>

</tr>

<tr>

<th>

Role

</th>

<td>

@if($user->role=='admin')

<span class="badge bg-danger">

Administrator

</span>

@else

<span class="badge bg-success">

Customer

</span>

@endif

</td>

</tr>

<tr>

<th>

Tanggal Dibuat

</th>

<td>

{{ $user->created_at->format('d F Y H:i') }}

</td>

</tr>

<tr>

<th>

Terakhir Diubah

</th>

<td>

{{ $user->updated_at->format('d F Y H:i') }}

</td>

</tr>

</table>

<div class="d-flex justify-content-between mt-4">

<a
href="{{ route('admin.users.index') }}"
class="btn btn-secondary">

<i class="fa fa-arrow-left"></i>

Kembali

</a>

<div>

<a
href="{{ route('admin.users.edit',$user) }}"
class="btn btn-warning">

<i class="fa fa-edit"></i>

Edit

</a>

@if(auth()->id() != $user->id)

<form
action="{{ route('admin.users.destroy',$user) }}"
method="POST"
class="d-inline"
onsubmit="return confirm('Yakin ingin menghapus user ini?')">

@csrf

@method('DELETE')

<button
class="btn btn-danger">

<i class="fa fa-trash"></i>

Hapus

</button>

</form>

@endif

</div>

</div>

</div>

</div>

</div>

</div>

</div>

@endsection