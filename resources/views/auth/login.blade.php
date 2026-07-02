<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

            padding:20px;

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

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(196, 123, 57, 0.5);
            border-color: #c47b39;
        }

        .btn-login{

            width:100%;

            height:50px;

            background:#c47b39;

            border:none;

            color:white;

            border-radius:10px;

            font-weight:bold;

            transition: all 0.3s ease;

        }

        .btn-login:hover{

            background:#8b5e34;

            transform: scale(1.02);

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

        .alert-danger {
            background: rgba(220, 53, 69, 0.9);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.9);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
        }

        .form-check-label {
            color: rgba(255,255,255,0.9);
        }

        .form-check-input:checked {
            background-color: #c47b39;
            border-color: #c47b39;
        }

        label {
            font-weight: 500;
            color: rgba(255,255,255,0.9);
        }

        @media (max-width: 480px) {
            .login-box {
                padding: 25px;
                width: 100%;
            }
            .logo {
                font-size: 40px;
            }
            h2 {
                font-size: 22px;
            }
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
        placeholder="Masukkan email Anda"
        required
        autofocus>

    </div>

    <div class="mb-3">

        <label>Password</label>

        <input
        type="password"
        name="password"
        class="form-control"
        placeholder="Masukkan password Anda"
        required>

    </div>

    <div class="form-check mb-3">

        <input
        class="form-check-input"
        type="checkbox"
        name="remember"
        id="remember">

        <label class="form-check-label" for="remember">

            Remember Me

        </label>

    </div>

    <button
    type="submit"
    class="btn btn-login">

    <i class="fa-solid fa-sign-in-alt"></i> Login

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
        href="{{ url('/') }}"
        class="back-home">

        ← Kembali ke Home

        </a>

    </div>

</form>

</div>

</div>

<!-- Font Awesome untuk icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</body>

</html>