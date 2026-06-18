<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .hero {
            height: 90vh;
            background: linear-gradient(
                rgba(0,0,0,0.6),
                rgba(0,0,0,0.6)
            ),
            url('https://images.unsplash.com/photo-1509042239860-f550ce710b93');
            background-size: cover;
            background-position: center;
            color: white;
        }

        .menu-card{
            transition:0.3s;
        }

        .menu-card:hover{
            transform:translateY(-8px);
        }

        .price{
            color:#8B4513;
            font-weight:bold;
            font-size:20px;
        }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">

        <a class="navbar-brand fw-bold" href="/">
            ☕ Coffee Shop
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#menu">Menu</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn btn-warning text-dark ms-2 px-3">
                        Pesan Sekarang
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>