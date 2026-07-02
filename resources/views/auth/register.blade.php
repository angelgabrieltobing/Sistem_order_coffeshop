<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1">

<title>Register | Coffee Shop</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<style>

*{

margin:0;
padding:0;
box-sizing:border-box;
font-family:Poppins,sans-serif;

}

body{

background:url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=1600&q=80');

background-size:cover;

background-position:center;

}

.overlay{

width:100%;
min-height:100vh;

display:flex;

justify-content:center;

align-items:center;

background:rgba(0,0,0,.65);

padding:40px;

}

.register{

width:470px;

background:rgba(255,255,255,.12);

backdrop-filter:blur(10px);

padding:40px;

border-radius:20px;

color:white;

}

.logo{

font-size:60px;

text-align:center;

}

.form-control{

height:50px;

border-radius:10px;

}

.btn-register{

width:100%;

height:50px;

border:none;

background:#c47b39;

color:white;

border-radius:10px;

font-weight:bold;

}

.btn-register:hover{

background:#8b5e34;

}

.text-warning {
    color: #f39c12 !important;
    text-decoration: none;
    font-weight: 600;
}

.text-warning:hover {
    text-decoration: underline;
}

.back-home {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: all 0.3s ease;
}

.back-home:hover {
    color: #fff;
    text-decoration: underline;
}

</style>

</head>

<body>

<div class="overlay">

<div class="register">

<div class="logo">

☕

</div>

<h2 class="text-center mb-4">

Register Coffee Shop

</h2>

<form
method="POST"
action="{{ route('register') }}">

@csrf

@if($errors->any())

<div class="alert alert-danger">

@foreach($errors->all() as $error)

<div>{{ $error }}</div>

@endforeach

</div>

@endif

<div class="mb-3">

<label>Nama</label>

<input
type="text"
name="name"
value="{{ old('name') }}"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
value="{{ old('email') }}"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="mb-4">

<label>Konfirmasi Password</label>

<input
type="password"
name="password_confirmation"
class="form-control"
required>

</div>

<button
type="submit"
class="btn btn-register">

Register

</button>

<div class="text-center mt-4">

Sudah punya akun?

<a
href="{{ route('login') }}"
class="text-warning">

Login

</a>

</div>

{{-- PERBAIKAN DI SINI --}}
<div class="text-center mt-3">

<a
href="{{ url('/') }}"
class="back-home">

← Kembali ke Home

</a>

</div>

</form>

</div>

</div>

</body>

</html>