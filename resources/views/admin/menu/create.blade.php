@extends('layouts.admin')

@section('title', 'Tambah Menu')

@section('page-title', 'Tambah Menu Coffee Shop')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header bg-success text-white">

            <h4 class="mb-0">

                <i class="fa-solid fa-plus-circle"></i>

                Tambah Menu Baru

            </h4>

        </div>

        <div class="card-body">

            <form
                action="{{ route('admin.menu.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="row">

                    {{-- Nama Menu --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Nama Menu

                        </label>

                        <input
                            type="text"
                            name="nama"
                            class="form-control @error('nama') is-invalid @enderror"
                            value="{{ old('nama') }}"
                            placeholder="Masukkan nama menu">

                        @error('nama')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    {{-- Kategori --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Kategori

                        </label>

                        <select
                            name="kategori"
                            class="form-select @error('kategori') is-invalid @enderror">

                            <option value="">-- Pilih Kategori --</option>

                            <option value="Coffee" @selected(old('kategori')=='Coffee')>

                                Coffee

                            </option>

                            <option value="Non Coffee" @selected(old('kategori')=='Non Coffee')>

                                Non Coffee

                            </option>

                            <option value="Tea" @selected(old('kategori')=='Tea')>

                                Tea

                            </option>

                            <option value="Snack" @selected(old('kategori')=='Snack')>

                                Snack

                            </option>

                            <option value="Dessert" @selected(old('kategori')=='Dessert')>

                                Dessert

                            </option>

                        </select>

                        @error('kategori')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    {{-- Harga --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Harga

                        </label>

                        <input
                            type="number"
                            name="harga"
                            class="form-control @error('harga') is-invalid @enderror"
                            value="{{ old('harga') }}"
                            placeholder="Contoh : 25000">

                        @error('harga')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Status

                        </label>

                        <select
                            name="status"
                            class="form-select @error('status') is-invalid @enderror">

                            <option value="">-- Pilih Status --</option>

                            <option value="Tersedia" @selected(old('status')=='Tersedia')>

                                Tersedia

                            </option>

                            <option value="Habis" @selected(old('status')=='Habis')>

                                Habis

                            </option>

                        </select>

                        @error('status')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    {{-- Deskripsi --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">

                            Deskripsi

                        </label>

                        <textarea
                            name="deskripsi"
                            rows="5"
                            class="form-control @error('deskripsi') is-invalid @enderror"
                            placeholder="Masukkan deskripsi menu...">{{ old('deskripsi') }}</textarea>

                        @error('deskripsi')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    {{-- Upload Gambar --}}
                    <div class="col-md-12 mb-4">

                        <label class="form-label">

                            Gambar Menu

                        </label>

                        <input
                            type="file"
                            name="gambar"
                            id="gambar"
                            class="form-control @error('gambar') is-invalid @enderror"
                            accept="image/*">

                        @error('gambar')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    {{-- Preview --}}
                    <div class="col-md-12 mb-4 text-center">

                        <img
                            id="preview"
                            src="https://via.placeholder.com/250x250?text=Preview"
                            class="img-thumbnail"
                            style="max-width:250px;">

                    </div>

                </div>

                <hr>

                <div class="d-flex justify-content-between">

                    <a
                        href="{{ route('admin.menu.index') }}"
                        class="btn btn-secondary">

                        <i class="fa-solid fa-arrow-left"></i>

                        Kembali

                    </a>

                    <button
                        type="submit"
                        class="btn btn-success">

                        <i class="fa-solid fa-floppy-disk"></i>

                        Simpan Menu

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

document.getElementById('gambar').addEventListener('change', function(e){

    const file = e.target.files[0];

    if(file){

        document.getElementById('preview').src = URL.createObjectURL(file);

    }

});

</script>

@endsection