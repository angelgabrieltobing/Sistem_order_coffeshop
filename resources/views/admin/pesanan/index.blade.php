@extends('layouts.admin')

@section('title','Kelola Pesanan')

@section('page-title','Kelola Pesanan')

@section('content')

<div class="container-fluid">

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

    {{-- SEARCH --}}

    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <form
                action="{{ route('admin.pesanan.index') }}"
                method="GET">

                <div class="row">

                    <div class="col-md-5">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari nomor pesanan atau pelanggan..."
                            value="{{ request('search') }}">

                    </div>

                    <div class="col-md-3">

                        <select
                            name="status"
                            class="form-select">

                            <option value="">

                                Semua Status

                            </option>

                            <option
                                value="Menunggu"
                                @selected(request('status')=='Menunggu')>

                                Menunggu

                            </option>

                            <option
                                value="Diproses"
                                @selected(request('status')=='Diproses')>

                                Diproses

                            </option>

                            <option
                                value="Selesai"
                                @selected(request('status')=='Selesai')>

                                Selesai

                            </option>

                            <option
                                value="Dibatalkan"
                                @selected(request('status')=='Dibatalkan')>

                                Dibatalkan

                            </option>

                        </select>

                    </div>

                    <div class="col-md-2 d-grid">

                        <button
                            class="btn btn-primary">

                            <i class="fa fa-search"></i>

                            Cari

                        </button>

                    </div>

                    <div class="col-md-2 d-grid">

                        <a
                            href="{{ route('admin.dashboard') }}"
                            class="btn btn-secondary">

                            Dashboard

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- TABLE --}}

    <div class="card shadow">

        <div class="card-header bg-dark text-white">

            <h5 class="mb-0">

                Daftar Pesanan

            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                    <tr>

                        <th>No</th>

                        <th>No Pesanan</th>

                        <th>Pelanggan</th>

                        <th>Total</th>

                        <th>Status</th>

                        <th>Pembayaran</th>

                        <th>Tanggal</th>

                        <th width="180">

                            Aksi

                        </th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($pesanans as $pesanan)

                    <tr>

                        <td>

                            {{ $loop->iteration + ($pesanans->currentPage()-1) * $pesanans->perPage() }}

                        </td>

                        <td>

                            <strong>

                                {{ $pesanan->nomor_pesanan }}

                            </strong>

                        </td>

                        <td>

                            {{ $pesanan->nama_pelanggan }}

                        </td>

                        <td>

                            Rp {{ number_format($pesanan->total_harga,0,',','.') }}

                        </td>

                        <td>

                            @switch($pesanan->status)

                                @case('Menunggu')

                                    <span class="badge bg-warning">

                                        Menunggu

                                    </span>

                                    @break

                                @case('Diproses')

                                    <span class="badge bg-info">

                                        Diproses

                                    </span>

                                    @break

                                @case('Selesai')

                                    <span class="badge bg-success">

                                        Selesai

                                    </span>

                                    @break

                                @default

                                    <span class="badge bg-danger">

                                        Dibatalkan

                                    </span>

                            @endswitch

                        </td>

                        <td>

                            @if($pesanan->status_pembayaran=="Lunas")

                                <span class="badge bg-success">

                                    Lunas

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Belum Bayar

                                </span>

                            @endif

                        </td>

                        <td>

                            {{ optional($pesanan->tanggal_pesanan)->format('d M Y') }}

                        </td>

                        <td>

                            <a
                                href="{{ route('admin.pesanan.show',$pesanan) }}"
                                class="btn btn-info btn-sm">

                                <i class="fa fa-eye"></i>

                            </a>

                            <a
                                href="{{ route('admin.pesanan.edit',$pesanan) }}"
                                class="btn btn-warning btn-sm">

                                <i class="fa fa-edit"></i>

                            </a>

                            <form
                                action="{{ route('admin.pesanan.destroy',$pesanan) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Hapus pesanan ini?')">

                                @csrf

                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm">

                                    <i class="fa fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td
                            colspan="8"
                            class="text-center py-5">

                            <img
                                src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png"
                                width="120">

                            <br><br>

                            Belum ada pesanan.

                        </td>

                    </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-4">

                {{ $pesanans->links() }}

            </div>

        </div>

    </div>

</div>

@endsection