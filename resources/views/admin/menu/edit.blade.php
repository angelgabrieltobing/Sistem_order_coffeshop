@extends('layouts.admin')

@section('title','Edit Menu')

@section('page-title','Edit Menu Coffee Shop')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header bg-warning">

            <h4 class="mb-0">

                <i class="fa-solid fa-pen-to-square"></i>

                Edit Menu

            </h4>

        </div>

        <div class="card-body">

            <form
                action="{{ route('admin.menu.update',$menu) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Nama --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Nama Menu

                        </label>

                        <input
                            type="text"
                            name="nama"
                            class="form-control @error('nama') is-invalid @enderror"
                            value="{{ old('nama',$menu->nama) }}">

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
                            class="form-select">

                            <option value="Coffee"
                                @selected(old('kategori',$menu->kategori)=='Coffee')>

                                Coffee

                            </option>

                            <option value="Non Coffee"
                                @selected(old('kategori',$menu->kategori)=='Non Coffee')>

                                Non Coffee

                            </option>

                            <option value="Tea"
                                @selected(old('kategori',$menu->kategori)=='Tea')>

                                Tea

                            </option>

                            <option value="Snack"
                                @selected(old('kategori',$menu->kategori)=='Snack')>

                                Snack

                            </option>

                            <option value="Dessert"
                                @selected(old('kategori',$menu->kategori)=='Dessert')>

                                Dessert

                            </option>

                        </select>

                    </div>

                    {{-- Harga --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Harga

                        </label>

                        <input
                            type="number"
                            name="harga"
                            class="form-control"
                            value="{{ old('harga',$menu->harga) }}">

                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Status

                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="Tersedia"
                                @selected(old('status',$menu->status)=='Tersedia')>

                                Tersedia

                            </option>

                            <option value="Habis"
                                @selected(old('status',$menu->status)=='Habis')>

                                Habis

                            </option>

                        </select>

                    </div>

                    {{-- Deskripsi --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">

                            Deskripsi

                        </label>

                        <textarea
                            name="deskripsi"
                            rows="5"
                            class="form-control">{{ old('deskripsi',$menu->deskripsi) }}</textarea>

                    </div>

                    {{-- Gambar --}}
                    <div class="col-md-6">

                        <label class="form-label">

                            Gambar Baru

                        </label>

                        <input
                            type="file"
                            id="gambar"
                            name="gambar"
                            class="form-control">

                    </div>

                    <div class="col-md-6 text-center">

                        @if($menu->gambar)

                            <img
                                id="preview"
                                src="{{ asset('storage/'.$menu->gambar) }}"
                                class="img-thumbnail"
                                style="max-width:220px;">

                        @else

                            <img
                                id="preview"
                                src="https://via.placeholder.com/220"
                                class="img-thumbnail">

                        @endif

                    </div>

                </div>

                <hr>

                <div class="d-flex justify-content-between">

                    <a
                        href="{{ route('admin.menu.index') }}"
                        class="btn btn-secondary">

                        <i class="fa fa-arrow-left"></i>

                        Kembali

                    </a>

                    <button
                        class="btn btn-warning">

                        <i class="fa fa-save"></i>

                        Update Menu

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

document.getElementById('gambar').addEventListener('change',function(e){

    const file=e.target.files[0];

    if(file){

        document.getElementById('preview').src=URL.createObjectURL(file);

    }

});

</script>

@endsection