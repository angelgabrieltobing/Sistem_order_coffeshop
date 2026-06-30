@extends('layouts.admin')

@section('title','Edit User')

@section('page-title','Edit User')

@section('content')

<div class="container-fluid">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow">

<div class="card-header bg-warning">

<h4 class="mb-0">

<i class="fa-solid fa-user-pen"></i>

Edit User

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
action="{{ route('admin.users.update',$user) }}"
method="POST">

@csrf

@method('PUT')

<div class="mb-3">

<label class="form-label">

Nama Lengkap

</label>

<input
type="text"
name="name"
class="form-control"
value="{{ old('name',$user->name) }}"
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
value="{{ old('email',$user->email) }}"
required>

</div>

<div class="row">

<div class="col-md-6">

<div class="mb-3">

<label class="form-label">

Password Baru

</label>

<input
type="password"
name="password"
class="form-control">

<small class="text-muted">

Kosongkan jika password tidak ingin diubah.

</small>

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
class="form-control">

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

<option
value="admin"
@selected(old('role',$user->role)=='admin')>

Admin

</option>

<option
value="customer"
@selected(old('role',$user->role)=='customer')>

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
class="btn btn-warning">

<i class="fa fa-save"></i>

Update User

</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

@endsection