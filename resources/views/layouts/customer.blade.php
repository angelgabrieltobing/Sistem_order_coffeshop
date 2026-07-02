<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Coffee Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>
        /* ===== NAVBAR STYLING ===== */
        .navbar-custom {
            background: linear-gradient(135deg, #2d3436, #1a1a2e) !important;
            padding: 12px 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .navbar-custom .navbar-brand {
            color: #fff;
            font-size: 24px;
            font-weight: 700;
        }

        .navbar-custom .navbar-brand i {
            color: #f39c12;
            margin-right: 10px;
        }

        .navbar-custom .navbar-brand:hover {
            color: #fff;
        }

        .btn-menu {
            color: rgba(255,255,255,0.8);
            border-color: rgba(255,255,255,0.3);
            transition: all 0.3s ease;
        }

        .btn-menu:hover {
            color: #fff;
            background: rgba(255,255,255,0.1);
            border-color: rgba(255,255,255,0.5);
        }

        .btn-cart {
            background: #f39c12;
            border: none;
            color: #fff;
            transition: all 0.3s ease;
            position: relative;
        }

        .btn-cart:hover {
            background: #e67e22;
            transform: scale(1.05);
            color: #fff;
        }

        .btn-cart .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #e74c3c;
            color: #fff;
            border-radius: 50%;
            padding: 2px 8px;
            font-size: 11px;
            font-weight: 700;
            min-width: 20px;
            text-align: center;
        }

        .btn-logout {
            background: #e74c3c;
            border: none;
            color: #fff;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: #c0392b;
            transform: scale(1.05);
            color: #fff;
        }

        .btn-profile {
            background: #6c5ce7;
            border: none;
            color: #fff;
            transition: all 0.3s ease;
        }

        .btn-profile:hover {
            background: #5a4bd1;
            transform: scale(1.05);
            color: #fff;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .navbar-custom .navbar-brand {
                font-size: 18px;
            }
            .btn-sm-custom {
                font-size: 12px;
                padding: 5px 10px;
            }
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

        /* ===== MAIN CONTENT ===== */
        .main-content {
            min-height: 70vh;
            padding: 30px 0;
        }
    </style>

</head>

<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">

        <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fa-solid fa-mug-saucer"></i> Coffee Shop
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-2">

                    {{-- PERBAIKAN: Menggunakan url('/menu') --}}
                    <li class="nav-item">
                        <a href="{{ url('/menu') }}" class="btn btn-menu btn-sm-custom">
                            <i class="fa-solid fa-utensils"></i> Menu
                        </a>
                    </li>

                    {{-- PERBAIKAN: Menggunakan url('/cart') --}}
                    <li class="nav-item">
                        <a href="{{ url('/cart') }}" class="btn btn-cart btn-sm-custom">
                            <i class="fa-solid fa-cart-shopping"></i> Keranjang
                            @if(isset($cartCount) && $cartCount > 0)
                                <span class="cart-badge">{{ $cartCount }}</span>
                            @endif
                        </a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a href="{{ route('customer.pesanan.index') }}" class="btn btn-profile btn-sm-custom">
                                <i class="fa-solid fa-history"></i> Pesanan
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="btn btn-secondary btn-sm-custom dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-user"></i> {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> Profil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fa-solid fa-sign-out-alt"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm-custom">
                                <i class="fa-solid fa-sign-in-alt"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-success btn-sm-custom">
                                <i class="fa-solid fa-user-plus"></i> Register
                            </a>
                        </li>
                    @endauth

                </ul>
            </div>

        </div>

    </nav>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content">
        @yield('content')
    </div>

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