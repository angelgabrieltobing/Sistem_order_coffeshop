<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        html{
            scroll-behavior:smooth;
        }

        body{
            background:#f8f5f2;
        }

        .navbar{
            background:#2b1d16;
        }

        .navbar-brand{
            color:white;
            font-size:30px;
            font-weight:bold;
        }

        .navbar-brand:hover{
            color:#ffc107;
        }

        .nav-link{
            color:white !important;
            margin-left:20px;
        }

        .nav-link:hover{
            color:#ffc107 !important;
        }

        .hero{
            height:100vh;
            background:url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=1600&q=80');
            background-size:cover;
            background-position:center;
            position:relative;
        }

        .hero::before{
            content:"";
            position:absolute;
            width:100%;
            height:100%;
            background:rgba(0,0,0,.6);
        }

        .hero-content{
            position:relative;
            z-index:10;
            height:100%;
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
            color:white;
            text-align:center;
        }

        .hero h1{
            font-size:70px;
            font-weight:bold;
        }

        .hero p{
            font-size:22px;
            margin:20px 0;
        }

        .btn-coffee{
            background:#c47b39;
            color:white;
            border:none;
            padding:13px 35px;
            border-radius:50px;
            transition:.3s;
        }

        .btn-coffee:hover{
            background:#8b5e34;
            color:white;
            transform:translateY(-3px);
        }

        .menu{
            padding:80px 0;
        }

        .card{
            border:none;
            transition:.3s;
        }

        .card:hover{
            transform:translateY(-10px);
            box-shadow:0 10px 25px rgba(0,0,0,.2);
        }

        .card img{
            height:250px;
            object-fit:cover;
        }

        footer{
            background:#2b1d16;
            color:white;
            padding:20px;
        }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">

<div class="container">

<a class="navbar-brand" href="#">
☕ Coffee Shop
</a>

<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a href="#" class="nav-link">Dashboard</a>
</li>

<li class="nav-item">
<a href="#menu-kopi" class="nav-link">Menu</a>
</li>

<li class="nav-item">
<a href="#about" class="nav-link">Tentang</a>
</li>

<li class="nav-item ms-2">
<a href="/login" class="btn btn-warning">Login</a>
</li>

<li class="nav-item ms-2">
<a href="/register" class="btn btn-outline-light">Register</a>
</li>

</ul>

</div>

</div>

</nav>

<section class="hero">

<div class="hero-content">

<h1>Nikmati Kopi Terbaik</h1>

<p>Kopi Premium dengan cita rasa terbaik untuk menemani harimu.</p>

<a href="#menu-kopi" class="btn btn-coffee btn-lg">
Lihat Menu
</a>

</div>

</section>

<section class="menu" id="menu-kopi">

<div class="container">

<h2 class="text-center mb-5">
Menu Favorit
</h2>

<div class="row">

<div class="col-md-4">

<div class="card">

<img src="https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=700&q=80">

<div class="card-body text-center">

<h4>Espresso</h4>

<p>Rp 18.000</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card">

<img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=700&q=80">

<div class="card-body text-center">

<h4>Cappuccino</h4>

<p>Rp 28.000</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card">

<img src="https://images.unsplash.com/photo-1494314671902-399b18174975?auto=format&fit=crop&w=700&q=80">

<div class="card-body text-center">

<h4>Latte</h4>

<p>Rp 30.000</p>

</div>

</div>

</div>

</div>

</div>

</section>

<section class="py-5 bg-light" id="about">

<div class="container text-center">

<h2>Tentang Coffee Shop</h2>

<p class="mt-4">
Kami menyajikan kopi pilihan dari biji kopi berkualitas tinggi yang diracik oleh barista profesional sehingga menghasilkan cita rasa yang khas dan premium.
</p>

</div>

</section>

<footer>

<div class="text-center">

© 2026 Coffee Shop | Laravel Project

</div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>