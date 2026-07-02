<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home - Coffee Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-custom {
            background: linear-gradient(135deg, #2d3436, #1a1a2e);
            padding: 15px 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }
        .navbar-custom .brand {
            color: #fff;
            font-size: 24px;
            font-weight: 700;
            text-decoration: none;
        }
        .navbar-custom .brand i {
            color: #f39c12;
            margin-right: 10px;
        }
        .navbar-custom .nav-link {
            color: rgba(255,255,255,0.8);
            transition: all 0.3s ease;
        }
        .navbar-custom .nav-link:hover {
            color: #fff;
        }

        .hero {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: #fff;
            padding: 80px 0 60px;
            border-radius: 0 0 50px 50px;
            margin-bottom: 40px;
        }
        .hero h1 {
            font-size: 48px;
            font-weight: 800;
        }

        .menu-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            height: 100%;
        }
        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(108, 92, 231, 0.2);
        }
        .menu-card img {
            height: 200px;
            object-fit: cover;
        }
        .menu-card .price {
            color: #e17055;
            font-weight: 700;
            font-size: 20px;
        }
        .menu-card .btn-order {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            border: none;
            border-radius: 30px;
            padding: 8px 24px;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }
        .menu-card .btn-order:hover {
            transform: scale(1.03);
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.4);
            color: #fff;
        }

        .footer {
            background: #2d3436;
            color: rgba(255,255,255,0.7);
            padding: 40px 0;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar-custom">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ url('/') }}" class="brand">
                <i class="fa-solid fa-mug-saucer"></i> Coffee Shop
            </a>
            <div>
                <a href="{{ url('/') }}" class="nav-link active d-inline">
                    <i class="fa-solid fa-house"></i> Home
                </a>
                {{-- PERBAIKAN: Menggunakan route('menu') --}}
                <a href="{{ route('menu') }}" class="nav-link d-inline ms-3">
                    <i class="fa-solid fa-utensils"></i> Menu
                </a>
                @auth
                    <a href="#" class="nav-link d-inline ms-3">
                        <i class="fa-solid fa-cart-shopping"></i> Cart
                    </a>
                    <a href="#" class="nav-link d-inline ms-3">
                        <i class="fa-solid fa-user"></i> {{ auth()->user()->name }}
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm ms-2">
                            <i class="fa-solid fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link d-inline ms-3">
                        <i class="fa-solid fa-sign-in-alt"></i> Login
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- ===== HERO ===== -->
<section class="hero">
    <div class="container text-center">
        <h1>☕ Selamat Datang di Coffee Shop</h1>
        <p class="lead">Nikmati berbagai pilihan kopi premium terbaik kami</p>
        {{-- PERBAIKAN: Menggunakan route('menu') --}}
        <a href="{{ route('menu') }}" class="btn btn-light btn-lg rounded-pill px-5 mt-3">
            <i class="fa-solid fa-utensils"></i> Lihat Menu
        </a>
    </div>
</section>

<!-- ===== MENU ===== -->
<section class="container">
    <h3 class="mb-4"><i class="fa-solid fa-utensils text-primary"></i> Menu Kami</h3>

    @if(isset($menus) && $menus->count() > 0)
        <div class="row g-4">
            @foreach($menus as $menu)
            <div class="col-md-4 col-lg-3">
                <div class="card menu-card">
                    @if($menu->gambar)
                        <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama }}">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($menu->nama) }}&background=6c5ce7&color=fff&size=200" alt="{{ $menu->nama }}">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="fw-bold">{{ $menu->nama }}</h5>
                        <span class="badge bg-secondary">{{ $menu->kategori ?? 'Minuman' }}</span>
                        <h5 class="price mt-2">Rp {{ number_format($menu->harga, 0, ',', '.') }}</h5>
                        <span class="badge bg-success">
                            <i class="fa-solid fa-check-circle"></i> Tersedia
                        </span>
                    </div>
                    <div class="card-footer bg-white border-0 text-center pb-3">
                        <form action="{{ route('cart.add', $menu->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-order">
                                <i class="fa-solid fa-cart-plus"></i> Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <i class="fa-solid fa-utensils fa-4x text-muted"></i>
            <h4 class="text-muted mt-3">Menu belum tersedia</h4>
            <p class="text-muted">Silakan cek kembali nanti</p>
        </div>
    @endif
</section>

<!-- ===== FOOTER ===== -->
<footer class="footer">
    <div class="container text-center">
        <p class="mb-0">
            <i class="fa-regular fa-copyright"></i> {{ date('Y') }} Coffee Shop. All Rights Reserved.
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>