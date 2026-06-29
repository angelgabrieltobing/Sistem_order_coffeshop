<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Coffee Shop Admin')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#f5f5f5;
        }

        .sidebar{

            position:fixed;

            left:0;

            top:0;

            width:250px;

            height:100vh;

            background:linear-gradient(180deg,#2b1d16,#4b2e20);

            color:white;

            overflow-y:auto;

            box-shadow:5px 0 20px rgba(0,0,0,.2);

        }

        .sidebar-header{

            text-align:center;

            padding:25px;

            border-bottom:1px solid rgba(255,255,255,.15);

        }

        .sidebar-header h3{

            color:#ffc107;

            font-weight:bold;

            margin:0;

        }

        .sidebar-menu{

            margin-top:20px;

        }

        .sidebar-menu a{

            display:block;

            color:white;

            text-decoration:none;

            padding:15px 25px;

            transition:.3s;

            font-size:16px;

        }

        .sidebar-menu a:hover{

            background:#6f4e37;

            color:#ffc107;

            padding-left:35px;

        }

        .sidebar-menu i{

            width:28px;

        }

        .topbar{

            position:fixed;

            left:250px;

            top:0;

            right:0;

            height:70px;

            background:white;

            box-shadow:0 2px 10px rgba(0,0,0,.08);

            display:flex;

            align-items:center;

            justify-content:space-between;

            padding:0 30px;

            z-index:999;

        }

        .topbar h5{

            margin:0;

            font-weight:bold;

        }

        .content{

            margin-left:250px;

            margin-top:90px;

            padding:30px;

        }

        .card{

            border:none;

            border-radius:15px;

            box-shadow:0 5px 15px rgba(0,0,0,.08);

        }

        .stat-card{

            border-left:5px solid #c47b39;

        }

        footer{

            margin-top:40px;

            text-align:center;

            color:#777;

        }

    </style>

</head>

<body>

<div class="sidebar">

    <div class="sidebar-header">

        <h3>☕ Coffee Shop</h3>

    </div>

    <div class="sidebar-menu">

        <a href="{{ route('dashboard') }}">

            <i class="fa fa-chart-line"></i>

            Dashboard

        </a>

        <a href="{{ route('admin.menu.index') }}">

            <i class="fa fa-mug-hot"></i>

            Kelola Menu

        </a>

        <a href="#">

            <i class="fa fa-shopping-cart"></i>

            Pesanan

        </a>

        <a href="#">

            <i class="fa fa-users"></i>

            User

        </a>

        <a href="#">

            <i class="fa fa-chart-bar"></i>

            Laporan

        </a>
            </div>

    <div style="position:absolute;bottom:25px;width:100%;padding:20px;">

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="submit" class="btn btn-danger w-100">

                <i class="fa fa-sign-out-alt me-2"></i>

                Logout

            </button>

        </form>

    </div>

</div>

<!-- Topbar -->

<div class="topbar">

    <div>

        <h5>

            @yield('page-title','Dashboard')

        </h5>

    </div>

    <div class="d-flex align-items-center">

        <span class="me-3">

            <i class="fa fa-user-circle"></i>

            {{ Auth::user()->name }}

        </span>

        <span class="badge bg-success">

            {{ ucfirst(Auth::user()->role) }}

        </span>

    </div>

</div>

<!-- Content -->

<div class="content">

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show">

            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    @yield('content')

    <footer>

        <hr>

        <p>

            © {{ date('Y') }}

            Coffee Shop Management System

            | Laravel 12

        </p>

    </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>

</html>