<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coffee Shop - Selamat Datang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* ===== NAVBAR ===== */
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
            font-weight: 500;
        }
        .navbar-custom .nav-link:hover {
            color: #fff;
        }
        .navbar-custom .nav-link.active {
            color: #f39c12;
        }

        /* ===== HERO ===== */
        .hero {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: #fff;
            padding: 100px 0 80px;
            border-radius: 0 0 50px 50px;
            margin-bottom: 40px;
        }
        .hero h1 {
            font-size: 56px;
            font-weight: 800;
        }
        .hero p {
            font-size: 20px;
            opacity: 0.9;
        }
        .hero .btn-hero {
            background: #fff;
            color: #6c5ce7;
            padding: 14px 40px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        .hero .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        /* ===== FEATURES ===== */
        .feature-card {
            background: #fff;
            border-radius: 16px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
            height: 100%;
        }
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(108, 92, 231, 0.15);
        }
        .feature-card i {
            font-size: 48px;
            color: #6c5ce7;
            margin-bottom: 15px;
        }
        .feature-card h5 {
            font-weight: 700;
        }

        /* ===== MENU PREVIEW ===== */
        .menu-preview-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
        }
        .menu-preview-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }
        .menu-preview-card img {
            height: 200px;
            object-fit: cover;
        }
        .menu-preview-card .price {
            color: #e17055;
            font-weight: 700;
            font-size: 18px;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: #2d3436;
            color: rgba(255,255,255,0.7);
            padding: 40px 0;
            margin-top: 50px;
        }
        .footer a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
        }
        .footer a:hover {
            color: #fff;
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
                {{-- PERBAIKAN: Menggunakan url('/menu') --}}
                <a href="{{ url('/menu') }}" class="nav-link d-inline ms-3">
                    <i class="fa-solid fa-utensils"></i> Menu
                </a>
                <a href="{{ route('tentang') }}" class="nav-link d-inline ms-3">
                    <i class="fa-solid fa-info-circle"></i> Tentang
                </a>
                @auth
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
                    <a href="{{ route('register') }}" class="nav-link d-inline ms-3">
                        <i class="fa-solid fa-user-plus"></i> Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- ===== HERO ===== -->
<section class="hero">
    <div class="container text-center">
        <h1>☕ Nikmati Kopi Terbaik</h1>
        <p class="mb-4">Temukan berbagai pilihan kopi premium dengan cita rasa terbaik</p>
        {{-- PERBAIKAN: Menggunakan url('/menu') --}}
        <a href="{{ url('/menu') }}" class="btn-hero">
            <i class="fa-solid fa-utensils"></i> Lihat Menu
        </a>
    </div>
</section>

<!-- ===== FEATURES ===== -->
<section class="container mb-5">
    <div class="row g-4">
        <div class="col-md-3">
            <div class="feature-card">
                <i class="fa-solid fa-mug-saucer"></i>
                <h5>Kopi Premium</h5>
                <p class="text-muted small">Biji kopi pilihan dari berbagai daerah</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="feature-card">
                <i class="fa-solid fa-bolt"></i>
                <h5>Pesanan Cepat</h5>
                <p class="text-muted small">Proses pemesanan yang mudah dan cepat</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="feature-card">
                <i class="fa-solid fa-tag"></i>
                <h5>Harga Terjangkau</h5>
                <p class="text-muted small">Harga bersahabat dengan kualitas terbaik</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="feature-card">
                <i class="fa-solid fa-headset"></i>
                <h5>Dukungan 24/7</h5>
                <p class="text-muted small">Layanan pelanggan siap membantu</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== MENU PREVIEW ===== -->
<section class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3><i class="fa-solid fa-utensils text-primary"></i> Menu Favorit</h3>
        {{-- PERBAIKAN: Menggunakan url('/menu') --}}
        <a href="{{ url('/menu') }}" class="btn btn-outline-primary">
            Lihat Semua <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>

    @if(isset($menus) && $menus->count() > 0)
        <div class="row g-4">
            @foreach($menus as $menu)
            <div class="col-md-4 col-lg-3">
                <div class="card menu-preview-card">
                    @if($menu->gambar)
                        <img src="{{ asset('storage/' . $menu->gambar) }}" class="card-img-top" alt="{{ $menu->nama }}">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($menu->nama) }}&background=6c5ce7&color=fff&size=200" class="card-img-top" alt="{{ $menu->nama }}">
                    @endif
                    <div class="card-body text-center">
                        <h6 class="fw-bold">{{ $menu->nama }}</h6>
                        <span class="badge bg-secondary">{{ $menu->kategori ?? 'Minuman' }}</span>
                        <h6 class="price mt-2">Rp {{ number_format($menu->harga, 0, ',', '.') }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <i class="fa-solid fa-utensils fa-3x text-muted"></i>
            <p class="text-muted mt-2">Menu belum tersedia</p>
        </div>
    @endif
</section>

<!-- ===== FOOTER ===== -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5 class="text-white"><i class="fa-solid fa-mug-saucer"></i> Coffee Shop</h5>
                <p>Nikmati kopi terbaik dengan cita rasa yang menggugah selera.</p>
            </div>
            <div class="col-md-4">
                <h5 class="text-white">Menu</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/menu') }}">Daftar Menu</a></li>
                    <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="text-white">Kontak</h5>
                <ul class="list-unstyled">
                    <li><i class="fa-solid fa-envelope"></i> info@coffeeshop.com</li>
                    <li><i class="fa-solid fa-phone"></i> (021) 1234-5678</li>
                </ul>
            </div>
        </div>
        <hr class="border-secondary">
        <p class="text-center mb-0">
            <i class="fa-regular fa-copyright"></i> {{ date('Y') }} Coffee Shop. All Rights Reserved.
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>