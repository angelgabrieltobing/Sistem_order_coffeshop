@extends('layouts.admin')

@section('title','Detail Menu')

@section('page-title','Detail Menu Coffee Shop')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header bg-info text-white">

            <h4 class="mb-0">

                <i class="fa-solid fa-eye"></i>

                Detail Menu

            </h4>

        </div>

        <div class="card-body">

            <div class="row">

                {{-- Gambar --}}
                <div class="col-md-4 text-center">

                    @if($menu->gambar)

                        <img
                            src="{{ asset('storage/'.$menu->gambar) }}"
                            class="img-fluid rounded shadow"
                            style="max-height:320px;object-fit:cover;">

                    @else

                        <img
                            src="https://via.placeholder.com/320x320?text=No+Image"
                            class="img-fluid rounded shadow">

                    @endif

                </div>

                {{-- Detail --}}
                <div class="col-md-8">

                    <table class="table table-bordered">

                        <tr>

                            <th width="220">

                                Nama Menu

                            </th>

                            <td>

                                {{ $menu->nama }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Kategori

                            </th>

                            <td>

                                {{ $menu->kategori }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Harga

                            </th>

                            <td>

                                <strong class="text-success">

                                    Rp {{ number_format($menu->harga,0,',','.') }}

                                </strong>

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Status

                            </th>

                            <td>

                                @if($menu->status=='Tersedia')

                                    <span class="badge bg-success">

                                        Tersedia

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Habis

                                    </span>

                                @endif

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Deskripsi

                            </th>

                            <td>

                                {{ $menu->deskripsi ?? '-' }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Dibuat

                            </th>

                            <td>

                                {{ $menu->created_at->format('d F Y H:i') }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Terakhir Diubah

                            </th>

                            <td>

                                {{ $menu->updated_at->format('d F Y H:i') }}

                            </td>

                        </tr>

                    </table>

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

                <div>

                    <a
                        href="{{ route('admin.menu.edit',$menu) }}"
                        class="btn btn-warning">

                        <i class="fa-solid fa-pen"></i>

                        Edit

                    </a>

                    <form
                        action="{{ route('admin.menu.destroy',$menu) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger"
                            onclick="return confirm('Yakin ingin menghapus menu ini?')">

                            <i class="fa-solid fa-trash"></i>

                            Hapus

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection