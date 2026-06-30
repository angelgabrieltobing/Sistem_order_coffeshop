<!DOCTYPE html>

<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1">

<title>Coffee Shop</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a
class="navbar-brand"
href="{{ route('home') }}">

☕

Coffee Shop

</a>

<div>

<a
href="{{ route('menu') }}"
class="btn btn-outline-light">

Menu

</a>

<a
href="{{ route('cart.index') }}"
class="btn btn-warning">

<i class="fa fa-shopping-cart"></i>

Keranjang

</a>

<form
action="{{ route('logout') }}"
method="POST"
class="d-inline">

@csrf

<button
class="btn btn-danger">

Logout

</button>

</form>

</div>

</div>

</nav>

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>