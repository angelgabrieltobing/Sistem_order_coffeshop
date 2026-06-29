<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Coffee Shop Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Poppins,sans-serif;
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

padding-top:20px;

box-shadow:5px 0 20px rgba(0,0,0,.2);

}

.sidebar h3{

text-align:center;

margin-bottom:35px;

color:#ffc107;

}

.sidebar a{

display:block;

padding:15px 25px;

color:white;

text-decoration:none;

transition:.3s;

}

.sidebar a:hover{

background:#6f4e37;

padding-left:35px;

color:#ffc107;

}

.sidebar i{

width:25px;

}

.content{

margin-left:250px;

padding:30px;

}

.card{

border:none;

border-radius:15px;

box-shadow:0 5px 15px rgba(0,0,0,.1);

}

</style>

</head>

<body>

<div class="sidebar">

<h3>☕ Coffee Shop</h3>

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

<div style="position:absolute;bottom:25px;width:100%;padding:20px;">

<form method="POST" action="{{ route('logout') }}">

@csrf

<button class="btn btn-danger w-100">

<i class="fa fa-sign-out-alt"></i>

Logout

</button>

</form>

</div>

</div>

<div class="content">

@yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>

</html>