<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Menu Coffee Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
        /* ===== GAYA UMUM ===== */
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
            color: rgba(255,255,255,0.7);
            transition: all 0.3s ease;
        }
        .navbar-custom .nav-link:hover {
            color: #fff;
        }

        /* ===== HEADER ===== */
        .page-header {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: #fff;
            padding: 60px 0 40px;
            border-radius: 0 0 50px 50px;
            margin-bottom: 40px;
        }

        /* ===== KARTU MENU ===== */
        .menu-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            background: #fff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            height: 100%;
        }
        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(108, 92, 231, 0.2);
        }
        .menu-card .card-img-top {
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .menu-card:hover .card-img-top {
            transform: scale(1.05);
        }
        .menu-card .card-body {
            padding: 20px;
        }
        .menu-card .menu-name {
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 5px;
        }
        .menu-card .menu-category {
            font-size: 13px;
            color: #6c5ce7;
            font-weight: 600;
        }
        .menu-card .menu-price {
            color: #e17055;
            font-weight: 700;
            font-size: 22px;
            margin: 10px 0;
        }
        .menu-card .menu-desc {
            font-size: 14px;
            color: #636e72;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .btn-order {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            border: none;
            border-radius: 30px;
            padding: 8px 24px;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }
        .btn-order:hover {
            transform: scale(1.03);
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.4);
            color: #fff;
        }

        /* ===== FILTER ===== */
        .filter-section {
            background: #fff;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            margin-bottom: 30px;
        }
        .filter-section .form-control,
        .filter-section .form-select {
            border-radius: 30px;
            padding: 10px 20px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        .filter-section .form-control:focus,
        .filter-section .form-select:focus {
            border-color: #6c5ce7;
            box-shadow: 0 0 0 0.2rem rgba(108, 92, 231, 0.25);
        }
        .btn-filter {
            border-radius: 30px;
            padding: 10px 30px;
            background: #6c5ce7;
            color: #fff;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-filter:hover {
            background: #5a4bd1;
            transform: scale(1.02);
        }

        /* ===== BADGE ===== */
        .badge-status {
            padding: 5px 14px;
            border-radius: 30px;
            font-weight: 500;
            font-size: 12px;
        }
        .badge-status.tersedia {
            background: #d4edda;
            color: #155724;
        }
        .badge-status.habis {
            background: #f8d7da;
            color: #721c24;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            padding: 80px 20px;
            text-align: center;
        }
        .empty-state i {
            font-size: 80px;
            color: #dfe6e9;
            margin-bottom: 20px;
        }

        /* ===== PAGINATION ===== */
        .pagination {
            justify-content: center;
            margin-top: 30px;
        }
        .pagination .page-link {
            border-radius: 30px;
            margin: 0 4px;
            color: #6c5ce7;
            border: none;
            padding: 8px 16px;
        }
        .pagination .page-item.active .page-link {
            background: #6c5ce7;
            color: #fff;
        }
        .pagination .page-link:hover {
            background: #f0edff;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .page-header {
                padding: 40px 0 30px;
            }
            .page-header h1 {
                font-size: 28px;
            }
            .menu-card .card-img-top {
                height: 150px;
            }
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
                <a href="{{ url('/') }}" class="nav-link d-inline">
                    <i class="fa-solid fa-house"></i> Home
                </a>
                <a href="{{ route('customer.menu') }}" class="nav-link d-inline ms-3">
                    <i class="fa-solid fa-utensils"></i> Menu
                </a>
                <a href="#" class="nav-link d-inline ms-3">
                    <i class="fa-solid fa-cart-shopping"></i> Cart
                </a>
                @auth
                    <a href="{{ route('logout') }}" class="nav-link d-inline ms-3" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link d-inline ms-3">
                        <i class="fa-solid fa-user"></i> Login
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- ===== HEADER ===== -->
<section class="page-header">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">
            <i class="fa-solid fa-utensils"></i> Menu Coffee Shop
        </h1>
        <p class="lead opacity-75">Nikmati kopi terbaik pilihan kami ☕</p>
    </div>
</section>

<!-- ===== KONTEN ===== -->
<div class="container">

    <!-- ===== FILTER ===== -->
    <div class="filter-section">
        <form method="GET" action="{{ route('customer.menu') }}">
            <div class="row g-3 align-items-end">
                <div class="col-md-5">
                    <label class="form-label fw-bold">
                        <i class="fa-solid fa-search"></i> Cari Menu
                    </label>
                    <input type="text" name="search" class="form-control" 
                           placeholder="Cari nama menu..." 
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">
                        <i class="fa-solid fa-tag"></i> Kategori
                    </label>
                    <select name="kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->nama }}" 
                                    {{ request('kategori') == $kategori->nama ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn-filter w-100">
                        <i class="fa-solid fa-filter"></i> Filter
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- ===== MENU ===== -->
    @if(isset($menus) && $menus->count() > 0)
        <div class="row g-4">
            @foreach($menus as $menu)
            <div class="col-md-4 col-lg-4">
                <div class="card menu-card">
                    @if($menu->gambar)
                        <img src="{{ asset('storage/' . $menu->gambar) }}" 
                             class="card-img-top" 
                             alt="{{ $menu->nama }}">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($menu->nama) }}&background=6c5ce7&color=fff&size=200" 
                             class="card-img-top" 
                             alt="{{ $menu->nama }}">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="menu-name">{{ $menu->nama }}</h5>
                                <span class="menu-category">
                                    <i class="fa-solid fa-tag"></i> {{ $menu->kategori ?? 'Minuman' }}
                                </span>
                            </div>
                            <span class="badge-status tersedia">
                                <i class="fa-solid fa-check-circle"></i> Tersedia
                            </span>
                        </div>
                        <p class="menu-desc mt-2">
                            {{ $menu->deskripsi ?? 'Nikmati kopi spesial kami dengan cita rasa terbaik.' }}
                        </p>
                        <h4 class="menu-price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</h4>
                        
                        <form action="{{ route('cart.add', $menu->id) }}" method="POST" class="mt-auto">
                            @csrf
                            <button type="submit" class="btn-order">
                                <i class="fa-solid fa-cart-plus"></i> Tambah ke Keranjang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- ===== PAGINATION ===== -->
        <div class="d-flex justify-content-center mt-4">
            {{ $menus->links() }}
        </div>

    @else
        <!-- ===== EMPTY STATE ===== -->
        <div class="empty-state">
            <i class="fa-solid fa-utensils"></i>
            <h3 class="text-muted">Menu belum tersedia</h3>
            <p class="text-muted">Silakan cek kembali nanti atau gunakan filter yang berbeda.</p>
            <a href="{{ route('customer.menu') }}" class="btn btn-primary mt-3">
                <i class="fa-solid fa-rotate"></i> Reset Filter
            </a>
        </div>
    @endif

</div>

<!-- ===== FOOTER ===== -->
<footer class="text-center text-muted py-4 mt-5 border-top">
    <div class="container">
        <small>
            <i class="fa-regular fa-copyright"></i> {{ date('Y') }} Coffee Shop 
            | Dibuat dengan <i class="fa-solid fa-heart text-danger"></i> dan <i class="fa-solid fa-mug-hot"></i>
        </small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Auto dismiss alerts after 3 seconds
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const closeBtn = alert.querySelector('.btn-close');
                if (closeBtn) {
                    closeBtn.click();
                }
            });
        }, 3000);
    });
</script>
</body>
</html>