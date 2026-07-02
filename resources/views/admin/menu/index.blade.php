<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Coffee Shop - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
        /* ===== GAYA UMUM ===== */
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 1300px;
        }

        /* ===== NAVBAR ATAS ===== */
        .navbar-top {
            background: linear-gradient(135deg, #2d3436, #1a1a2e);
            padding: 15px 0;
            margin-bottom: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }
        .navbar-top .brand {
            color: #fff;
            font-size: 24px;
            font-weight: 700;
            text-decoration: none;
        }
        .navbar-top .brand i {
            color: #f39c12;
            margin-right: 10px;
        }

        /* ===== KARTU ===== */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .card-header {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: #fff;
            padding: 18px 24px;
            font-weight: 600;
            font-size: 18px;
            border: none;
        }

        /* ===== TOMBOL KEMBALI ===== */
        .btn-back {
            background: rgba(255,255,255,0.2);
            color: #fff;
            border: 2px solid rgba(255,255,255,0.3);
            padding: 8px 20px;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        .btn-back:hover {
            background: rgba(255,255,255,0.3);
            color: #fff;
            transform: translateX(-3px);
        }

        /* ===== TABEL ===== */
        .table {
            margin-bottom: 0;
            font-size: 14px;
        }
        .table thead th {
            background: #2d3436;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            padding: 12px 8px;
            vertical-align: middle;
        }
        .table tbody tr:hover {
            background: #f8f9fa;
        }
        .table tbody td {
            vertical-align: middle;
            padding: 12px 8px;
        }

        /* ===== GAMBAR ===== */
        .table-img {
            width: 55px;
            height: 55px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #eee;
            transition: transform 0.3s ease;
        }
        .table-img:hover {
            transform: scale(1.8);
            z-index: 999;
            position: relative;
            border-color: #6c5ce7;
        }

        /* ===== BADGE ===== */
        .badge-status {
            padding: 6px 14px;
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

        /* ===== TOMBOL AKSI ===== */
        .btn-aksi {
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 12px;
            margin: 2px;
            transition: all 0.3s ease;
        }
        .btn-aksi:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        /* ===== TOMBOL TAMBAH ===== */
        .btn-tambah {
            background: linear-gradient(135deg, #00b894, #00cec9);
            color: #fff;
            border: none;
            padding: 10px 28px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-tambah:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,206,201,0.4);
            color: #fff;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .header-actions {
                flex-direction: column;
                gap: 10px;
                align-items: stretch;
            }
            .table {
                font-size: 12px;
            }
            .table-img {
                width: 35px;
                height: 35px;
            }
            .btn-aksi {
                font-size: 10px;
                padding: 3px 8px;
            }
        }
    </style>
</head>
<body>

<!-- ===== NAVBAR ATAS ===== -->
<nav class="navbar-top">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('admin.dashboard') }}" class="brand">
                <i class="fa-solid fa-mug-saucer"></i> Coffee Shop Admin
            </a>
            <a href="{{ route('admin.dashboard') }}" class="btn-back">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>
</nav>

<!-- ===== KONTEN UTAMA ===== -->
<div class="container mt-4">

    <!-- ===== HEADER HALAMAN ===== -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 header-actions">
        <h2 class="mb-0">
            <i class="fa-solid fa-utensils text-primary"></i> 
            Manajemen Menu
            <small class="text-muted fs-6 fw-light">Kelola daftar menu coffee shop</small>
        </h2>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                <i class="fa-solid fa-arrow-left"></i> Dashboard
            </a>
            <a href="{{ route('admin.menu.create') }}" class="btn-tambah">
                <i class="fa-solid fa-plus"></i> Tambah Menu
            </a>
        </div>
    </div>

    <!-- ===== NOTIFIKASI ===== -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-exclamation-circle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- ===== KARTU TABEL ===== -->
    <div class="card">
        <div class="card-header">
            <i class="fa-solid fa-list me-2"></i> Daftar Menu
            <span class="badge bg-light text-dark ms-2">{{ $menus->count() }}</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th style="width: 80px;">Gambar</th>
                            <th>Nama Menu</th>
                            <th>Kategori</th>
                            <th style="width: 120px;">Harga</th>
                            <th style="width: 110px;">Status</th>
                            <th style="width: 250px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($menus as $index => $menu)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($menu->gambar)
                                    <img src="{{ asset('storage/' . $menu->gambar) }}" 
                                         alt="{{ $menu->nama }}" 
                                         class="table-img"
                                         loading="lazy">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($menu->nama) }}&background=6c5ce7&color=fff&size=50" 
                                         alt="{{ $menu->nama }}" 
                                         class="table-img">
                                @endif
                            </td>
                            <td class="fw-semibold">{{ $menu->nama }}</td>
                            <td>
                                <span class="badge bg-info text-dark">{{ $menu->kategori ?? 'Umum' }}</span>
                            </td>
                            <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                            <td>
                                @if($menu->is_available)
                                    <span class="badge-status tersedia">
                                        <i class="fa-solid fa-check-circle"></i> Tersedia
                                    </span>
                                @else
                                    <span class="badge-status habis">
                                        <i class="fa-solid fa-times-circle"></i> Habis
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex flex-wrap justify-content-center gap-1">
                                    <a href="{{ route('admin.menu.edit', $menu->id) }}" 
                                       class="btn btn-warning btn-aksi">
                                        <i class="fa-solid fa-edit"></i> Edit
                                    </a>
                                    
                                    <form action="{{ route('admin.menu.toggle', $menu->id) }}" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" 
                                                class="btn btn-aksi {{ $menu->is_available ? 'btn-secondary' : 'btn-success' }}">
                                            <i class="fa-solid {{ $menu->is_available ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                            {{ $menu->is_available ? 'Tutup' : 'Buka' }}
                                        </button>
                                    </form>
                                    
                                    <form action="{{ route('admin.menu.destroy', $menu->id) }}" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-danger btn-aksi" 
                                                onclick="return confirm('Yakin ingin menghapus menu {{ $menu->nama }}?')">
                                            <i class="fa-solid fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="fa-solid fa-utensils fa-3x text-muted mb-3 d-block"></i>
                                <h5 class="text-muted">Belum ada menu</h5>
                                <p class="text-muted small">Klik tombol <strong>"Tambah Menu"</strong> untuk menambahkan menu baru.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-light">
            <div class="d-flex justify-content-between align-items-center">
                <span class="text-muted small">
                    <i class="fa-regular fa-clock"></i> Total {{ $menus->count() }} menu
                </span>
                @if(method_exists($menus, 'links'))
                    {{ $menus->links() }}
                @endif
            </div>
        </div>
    </div>

    <!-- ===== INFORMASI TAMBAHAN ===== -->
    <div class="row mt-4 g-3">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body d-flex align-items-center">
                    <i class="fa-solid fa-coffee fa-2x me-3"></i>
                    <div>
                        <h6 class="mb-0">Total Menu</h6>
                        <h3 class="mb-0">{{ $menus->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body d-flex align-items-center">
                    <i class="fa-solid fa-check-circle fa-2x me-3"></i>
                    <div>
                        <h6 class="mb-0">Tersedia</h6>
                        <h3 class="mb-0">{{ $menus->where('is_available', true)->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-danger text-white">
                <div class="card-body d-flex align-items-center">
                    <i class="fa-solid fa-times-circle fa-2x me-3"></i>
                    <div>
                        <h6 class="mb-0">Habis</h6>
                        <h3 class="mb-0">{{ $menus->where('is_available', false)->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== FOOTER ===== -->
<footer class="text-center text-muted py-4 mt-4 border-top">
    <small>
        <i class="fa-regular fa-copyright"></i> {{ date('Y') }} Coffee Shop Admin Panel 
        | Dibuat dengan <i class="fa-solid fa-heart text-danger"></i> dan <i class="fa-solid fa-mug-hot"></i>
    </small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ===== AUTO CLOSE ALERT =====
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

    // ===== KONFIRMASI HAPUS (Sudah ada di onclick) =====
</script>
</body>
</html>