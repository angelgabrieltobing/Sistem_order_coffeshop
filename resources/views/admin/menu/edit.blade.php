<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card shadow col-md-8 mx-auto">
        <div class="card-header bg-warning">
            <h4><i class="fa-solid fa-edit"></i> Edit Menu</h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Menu <span class="text-danger">*</span></label>
                    <input type="text" name="nama" value="{{ $menu->nama }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori" class="form-control" required>
                        <option value="Coffee" {{ $menu->kategori == 'Coffee' ? 'selected' : '' }}>Coffee</option>
                        <option value="Non-Coffee" {{ $menu->kategori == 'Non-Coffee' ? 'selected' : '' }}>Non-Coffee</option>
                        <option value="Food" {{ $menu->kategori == 'Food' ? 'selected' : '' }}>Food</option>
                        <option value="Snack" {{ $menu->kategori == 'Snack' ? 'selected' : '' }}>Snack</option>
                        <option value="Dessert" {{ $menu->kategori == 'Dessert' ? 'selected' : '' }}>Dessert</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                    <input type="number" name="harga" value="{{ $menu->harga }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="form-control">{{ $menu->deskripsi }}</textarea>
                </div>

                <!-- PREVIEW GAMBAR SAAT INI -->
                <div class="mb-3">
                    <label class="form-label">Gambar Saat Ini</label>
                    <div>
                        @if($menu->gambar)
                            <img src="{{ asset('storage/' . $menu->gambar) }}" 
                                 alt="{{ $menu->nama }}" 
                                 class="preview-img">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </div>
                </div>

                <!-- GANTI GAMBAR -->
                <div class="mb-3">
                    <label class="form-label">Ganti Gambar</label>
                    <input type="file" 
                           name="gambar" 
                           accept="image/*" 
                           class="form-control">
                    <small class="text-muted">Format: JPEG, PNG, JPG (Max 2MB)</small>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="is_available" value="1" class="form-check-input" {{ $menu->is_available ? 'checked' : '' }}>
                    <label class="form-check-label">Tersedia</label>
                </div>

                <button type="submit" class="btn btn-warning">
                    <i class="fa-solid fa-save"></i> Update
                </button>
                <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>