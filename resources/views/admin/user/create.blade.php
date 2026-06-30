@extends('layouts.admin')

@section('title','Tambah User')

@section('page-title','Tambah User')

@section('content')

<div class="container-fluid">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4 class="mb-0">

<i class="fa fa-user-plus"></i>

Tambah User

</h4>

</div>

<div class="card-body">

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
action="{{ route('admin.users.store') }}"
method="POST">

@csrf

<div class="mb-3">

<label class="form-label">

Nama Lengkap

</label>

<input
type="text"
name="name"
class="form-control"
value="{{ old('name') }}"
required>

</div>

<div class="mb-3">

<label class="form-label">

Email

</label>

<input
type="email"
name="email"
class="form-control"
value="{{ old('email') }}"
required>

</div>

<div class="row">

<div class="col-md-6">

<div class="mb-3">

<label class="form-label">

Password

</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

</div>

<div class="col-md-6">

<div class="mb-3">

<label class="form-label">

Konfirmasi Password

</label>

<input
type="password"
name="password_confirmation"
class="form-control"
required>

</div>

</div>

</div>

<div class="mb-3">

<label class="form-label">

Role

</label>

<select
name="role"
class="form-select"
required>

<option value="">

Pilih Role

</option>

<option
value="admin"
@selected(old('role')=='admin')>

Admin

</option>

<option
value="customer"
@selected(old('role')=='customer')>

Customer

</option>

</select>

</div>

<hr>

<div class="d-flex justify-content-between">

<a
href="{{ route('admin.users.index') }}"
class="btn btn-secondary">

<i class="fa fa-arrow-left"></i>

Kembali

</a>

<button
class="btn btn-success">

<i class="fa fa-save"></i>

Simpan User

</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

@endsection 