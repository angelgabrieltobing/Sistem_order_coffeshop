<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Coffee Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{

            background:url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=1600&q=80');

            background-size:cover;

            background-position:center;

            min-height:100vh;

        }

        .overlay{

            width:100%;
            min-height:100vh;

            background:rgba(0,0,0,.65);

            display:flex;

            justify-content:center;

            align-items:center;

        }

        .login-box{

            width:450px;

            background:rgba(255,255,255,.12);

            backdrop-filter:blur(12px);

            border-radius:20px;

            padding:40px;

            color:white;

            box-shadow:0 10px 30px rgba(0,0,0,.5);

        }

        .logo{

            text-align:center;

            font-size:60px;

        }

        h2{

            text-align:center;

            margin-bottom:25px;

            font-weight:bold;

        }

        .form-control{

            height:50px;

            border-radius:10px;

        }

        .btn-login{

            width:100%;

            height:50px;

            background:#c47b39;

            border:none;

            color:white;

            border-radius:10px;

            font-weight:bold;

        }

        .btn-login:hover{

            background:#8b5e34;

        }

    </style>

</head>

<body>

<div class="overlay">

<div class="login-box">

<div class="logo">

☕

</div>

<h2>Coffee Shop</h2>

<form method="POST" action="{{ route('login') }}">

@csrf

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

@if($errors->any())

<div class="alert alert-danger">

@foreach($errors->all() as $error)

<div>{{ $error }}</div>

@endforeach

</div>

@endif

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

<div class="form-check mb-3">

<input
class="form-check-input"
type="checkbox"
name="remember">

<label class="form-check-label">

Remember Me

</label>

</div>

<button
type="submit"
class="btn btn-login">

Login

</button>

<div class="text-center mt-4">

Belum punya akun?

<a
href="{{ route('register') }}"
class="text-warning">

Register

</a>

</div>

<div class="text-center mt-3">

<a
href="{{ route('home') }}"
class="text-white">

← Kembali ke Home

</a>

</div>

</form>

</div>

</div>

</body>

</html>