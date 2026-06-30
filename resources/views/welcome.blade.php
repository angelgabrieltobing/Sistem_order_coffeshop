<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Coffee Shop Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

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
            transition:.3s;
        }

        .navbar-brand{
            color:#fff;
            font-size:30px;
            font-weight:bold;
        }

        .navbar-brand:hover{
            color:#ffc107;
        }

        .nav-link{
            color:white !important;
            margin-left:18px;
            font-weight:500;
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
            inset:0;
            background:rgba(0,0,0,.60);
        }

        .hero-content{
            position:relative;
            z-index:10;
            height:100%;
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
            text-align:center;
            color:white;
        }

        .hero h1{
            font-size:70px;
            font-weight:700;
        }

        .hero p{
            font-size:22px;
            margin:20px 0;
        }

        .btn-coffee{

            background:#c47b39;
            color:white;
            border:none;
            padding:14px 35px;
            border-radius:50px;
            transition:.3s;

        }

        .btn-coffee:hover{

            background:#8b5e34;
            color:white;
            transform:translateY(-3px);

        }

        .menu{

            padding:90px 0;

        }

        .card{

            border:none;
            transition:.3s;

        }

        .card:hover{

            transform:translateY(-8px);

            box-shadow:0 10px 25px rgba(0,0,0,.20);

        }

        .card img{

            height:250px;

            object-fit:cover;

        }

        footer{

            background:#2b1d16;

            color:white;

            padding:25px;

        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">

<div class="container">

<a
class="navbar-brand"
href="{{ route('home') }}">

☕ Coffee Shop

</a>

<button
class="navbar-toggler"
data-bs-toggle="collapse"
data-bs-target="#navbarCoffee">

<span class="navbar-toggler-icon"></span>

</button>

<div
class="collapse navbar-collapse"
id="navbarCoffee">

<ul class="navbar-nav ms-auto align-items-center">

<li class="nav-item">

<a
href="{{ route('home') }}"
class="nav-link">

Home

</a>

</li>

<li class="nav-item">

<a
href="#menu-kopi"
class="nav-link">

Menu

</a>

</li>

<li class="nav-item">

<a
href="#about"
class="nav-link">

Tentang

</a>

</li>

@auth

    @if(Auth::user()->role == 'admin')

        <li class="nav-item">

            <a
            href="{{ route('admin.dashboard') }}"
            class="nav-link">

                Dashboard

            </a>

        </li>

    @else

        <li class="nav-item">

            <a
            href="{{ route('menu') }}"
            class="nav-link">

                Menu

            </a>

        </li>

        <li class="nav-item">

            <a
            href="{{ route('cart.index') }}"
            class="nav-link">

                <i class="fa-solid fa-cart-shopping"></i>

                Keranjang

            </a>

        </li>

    @endif

    <li class="nav-item dropdown ms-3">

        <a
        class="btn btn-warning dropdown-toggle"
        href="#"
        role="button"
        data-bs-toggle="dropdown">

            {{ Auth::user()->name }}

        </a>

        <ul class="dropdown-menu dropdown-menu-end">

            <li>

                <form
                action="{{ route('logout') }}"
                method="POST">

                    @csrf

                    <button
                    class="dropdown-item">

                        Logout

                    </button>

                </form>

            </li>

        </ul>

    </li>

@endauth

@guest

<li class="nav-item ms-2">

<a
href="{{ route('login') }}"
class="btn btn-warning">

Login

</a>

</li>

<li class="nav-item ms-2">

<a
href="{{ route('register') }}"
class="btn btn-outline-light">

Register

</a>

</li>

@endguest

</ul>

</div>

</div>

</nav>
<!-- ===========================
     HERO SECTION
============================ -->

<section class="hero">

    <div class="hero-content">

        <h1>

            Nikmati Kopi Terbaik

        </h1>

        <p>

            Kopi Premium dengan cita rasa terbaik untuk menemani harimu.

        </p>

        <a
            href="#menu-kopi"
            class="btn btn-coffee btn-lg">

            Lihat Menu

        </a>

    </div>

</section>


<!-- ===========================
     MENU
============================ -->

<section
class="menu"
id="menu-kopi">

<div class="container">

<div class="text-center mb-5">

<h2 class="fw-bold">

Menu Favorit

</h2>

<p class="text-muted">

Semua menu di bawah ini diambil langsung dari database Laravel.

</p>

</div>


<div class="row">

@forelse($menus as $menu)

<div class="col-lg-4 col-md-6 mb-4">

<div class="card h-100 shadow-sm">

@if($menu->gambar)

<img
src="{{ asset('storage/'.$menu->gambar) }}"
class="card-img-top">

@else

<img
src="https://via.placeholder.com/600x400?text=Coffee"
class="card-img-top">

@endif


<div class="card-body d-flex flex-column">

<h4 class="fw-bold">

{{ $menu->nama }}

</h4>

<span class="badge bg-secondary mb-2">

{{ $menu->kategori }}

</span>

<p class="text-muted">

{{ \Illuminate\Support\Str::limit($menu->deskripsi,90) }}

</p>

<div class="mt-auto">

<h4 class="text-success">

Rp {{ number_format($menu->harga,0,',','.') }}

</h4>

@if($menu->status=="Tersedia")

<span class="badge bg-success mb-3">

Tersedia

</span>

<form
action="{{ route('cart.add',$menu) }}"
method="POST">

@csrf

<button
class="btn btn-success w-100">

<i class="fa-solid fa-cart-shopping"></i>

Tambah ke Keranjang

</button>

</form>

@else

<span class="badge bg-danger mb-3">

Habis

</span>

<button
class="btn btn-secondary w-100"
disabled>

Menu Habis

</button>

@endif

</div>

</div>

</div>

</div>

@empty

<div class="col-12">

<div class="alert alert-warning text-center">

<h4>

Belum Ada Menu

</h4>

<p>

Silakan tambahkan menu melalui Dashboard Admin.

</p>

</div>

</div>

@endforelse

</div>

</div>

</section>
<!-- ==========================================
                TENTANG
========================================== -->

<section class="py-5 bg-light" id="about">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <img
                    src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=900&q=80"
                    class="img-fluid rounded shadow">

            </div>

            <div class="col-lg-6">

                <h2 class="fw-bold mb-4">

                    Tentang Coffee Shop

                </h2>

                <p class="text-muted">

                    Coffee Shop merupakan sistem pemesanan minuman berbasis Laravel
                    yang memudahkan pelanggan melakukan pemesanan secara online
                    sekaligus membantu admin mengelola menu, pesanan,
                    pembayaran, dan laporan.

                </p>

                <p class="text-muted">

                    Seluruh data menu ditampilkan langsung dari database sehingga
                    perubahan yang dilakukan Admin akan langsung terlihat oleh
                    pelanggan.

                </p>

                <a
                    href="{{ route('menu') }}"
                    class="btn btn-coffee">

                    Lihat Semua Menu

                </a>

            </div>

        </div>

    </div>

</section>

<!-- ==========================================
                FOOTER
========================================== -->

<footer>

    <div class="container">

        <div class="row">

            <div class="col-md-4">

                <h4>

                    ☕ Coffee Shop

                </h4>

                <p>

                    Sistem Pemesanan Coffee Shop
                    berbasis Laravel 12.

                </p>

            </div>

            <div class="col-md-4">

                <h5>

                    Navigasi

                </h5>

                <ul class="list-unstyled">

                    <li>

                        <a
                            href="{{ route('home') }}"
                            class="text-white text-decoration-none">

                            Home

                        </a>

                    </li>

                    <li>

                        <a
                            href="{{ route('menu') }}"
                            class="text-white text-decoration-none">

                            Menu

                        </a>

                    </li>

                    <li>

                        <a
                            href="#about"
                            class="text-white text-decoration-none">

                            Tentang

                        </a>

                    </li>

                </ul>

            </div>

            <div class="col-md-4 text-md-end">

                <h5>

                    Contact

                </h5>

                <p>

                    📍 Indonesia

                </p>

                <p>

                    ☎ +62 812-3456-7890

                </p>

                <p>

                    ✉ admin@coffeeshop.com

                </p>

            </div>

        </div>

        <hr class="border-light">

        <div class="text-center">

            © {{ date('Y') }}

            Coffee Shop Laravel

            | Developed by Feliks Team

        </div>

    </div>

</footer>

<!-- ==========================================
            BACK TO TOP
========================================== -->

<button
    id="topButton"
    class="btn btn-warning rounded-circle"
    style="
        display:none;
        position:fixed;
        bottom:25px;
        right:25px;
        width:50px;
        height:50px;
        z-index:999;
    ">

    ↑

</button>

<!-- Bootstrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

const topButton = document.getElementById("topButton");

window.addEventListener("scroll",function(){

    if(window.scrollY > 300){

        topButton.style.display="block";

    }else{

        topButton.style.display="none";

    }

});

topButton.addEventListener("click",function(){

    window.scrollTo({

        top:0,

        behavior:"smooth"

    });

});

</script>

</body>
</html>