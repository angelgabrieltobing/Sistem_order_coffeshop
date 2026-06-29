<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Tambah Menu</title>

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

width:250px;

height:100vh;

background:linear-gradient(180deg,#2b1d16,#4b2e20);

padding-top:20px;

}

.sidebar h3{

text-align:center;

color:#ffc107;

margin-bottom:35px;

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

.content{

margin-left:250px;

padding:30px;

}

.card{

border:none;

border-radius:15px;

box-shadow:0 5px 20px rgba(0,0,0,.1);

}

.preview{

    width:200px;

    height:200px;

    object-fit:cover;

    border-radius:15px;

    border:2px solid #ddd;

    padding:5px;

    background:#fff;

    box-shadow:0 5px 15px rgba(0,0,0,.15);

    transition:.3s;

}

</style>

</head>

<body>

<div class="sidebar">

<h3>☕ Coffee Shop</h3>

<a href="{{ route('dashboard') }}">
<i class="fa fa-chart-line me-2"></i>
Dashboard
</a>

<a href="{{ route('admin.menu.index') }}">
<i class="fa fa-mug-hot me-2"></i>
Kelola Menu
</a>

<a href="#">
<i class="fa fa-shopping-cart me-2"></i>
Pesanan
</a>

<a href="#">
<i class="fa fa-users me-2"></i>
User
</a>

<a href="#">
<i class="fa fa-chart-bar me-2"></i>
Laporan
</a>

<div style="position:absolute;bottom:30px;width:100%;padding:20px;">

<form action="{{ route('logout') }}" method="POST">

@csrf

<button class="btn btn-danger w-100">

Logout

</button>

</form>

</div>

</div>

<div class="content">

<div class="container">

<div class="card">

<div class="card-header bg-dark text-white">

<h4>

Tambah Menu Coffee

</h4>

</div>

<div class="card-body">

@if($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form
action="{{ route('admin.menu.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

<div class="mb-3">

<label class="form-label">

Nama Menu

</label>

<input
type="text"
name="nama"
class="form-control"
value="{{ old('nama') }}"
required>

</div>

<div class="mb-3">

<label class="form-label">

Kategori

</label>

<select
name="kategori"
class="form-select"
required>

<option value="">Pilih Kategori</option>

<option value="Coffee">Coffee</option>

<option value="Non Coffee">Non Coffee</option>

<option value="Tea">Tea</option>

<option value="Snack">Snack</option>

<option value="Dessert">Dessert</option>

</select>

</div>

<div class="mb-3">

<label class="form-label">

Harga

</label>

<input
type="number"
name="harga"
class="form-control"
value="{{ old('harga') }}"
required>

</div>

<div class="mb-3">

<label class="form-label">

Deskripsi

</label>

<textarea
name="deskripsi"
class="form-control"
rows="5">{{ old('deskripsi') }}</textarea>

</div>

<div class="mb-3">

<label class="form-label">

Upload Gambar

</label>

<input
type="file"
name="gambar"
class="form-control"
accept="image/*"
onchange="previewImage(event)">

<div class="mb-3">

    <label class="form-label">

        Upload Gambar

    </label>

    <input
        type="file"
        name="gambar"
        class="form-control"
        accept="image/png,image/jpeg,image/jpg,image/webp"
        onchange="previewImage(event)">

    <div class="mt-3">

        <img
            id="preview"
            class="preview"
            src="https://via.placeholder.com/200x200?text=Preview"
            alt="Preview Gambar">

    </div>

    <small class="text-muted">

        Format yang didukung: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.

    </small>

</div>

</div>

<div class="mb-4">

<label class="form-label">

Status

</label>

<select
name="status"
class="form-select">

<option value="Tersedia">

Tersedia

</option>

<option value="Habis">

Habis

</option>

</select>

</div>

<button
class="btn btn-success">

<i class="fa fa-save"></i>

Simpan

</button>

<a
href="{{ route('admin.menu.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</div>

<script>

function previewImage(event){

    const file = event.target.files[0];

    if(!file){

        return;

    }

    const reader = new FileReader();

    reader.onload = function(e){

        document.getElementById('preview').src = e.target.result;

    }

    reader.readAsDataURL(file);

}

</script>

</body>

</html>