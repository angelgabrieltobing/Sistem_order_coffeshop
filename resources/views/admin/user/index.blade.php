@extends('layouts.admin')

@section('title', 'Kelola User')

@section('page-title', 'Kelola User')

@section('content')

<div class="container-fluid">

    {{-- Alert --}}
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

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">

            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>
    @endif

    {{-- Card Search --}}
    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <form
                action="{{ route('admin.users.index') }}"
                method="GET">

                <div class="row">

                    <div class="col-md-5">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari nama atau email..."
                            value="{{ request('search') }}">

                    </div>

                    <div class="col-md-3">

                        <select
                            name="role"
                            class="form-select">

                            <option value="">
                                Semua Role
                            </option>

                            <option
                                value="admin"
                                @selected(request('role')=='admin')>

                                Admin

                            </option>

                            <option
                                value="customer"
                                @selected(request('role')=='customer')>

                                Customer

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
                            href="{{ route('admin.users.create') }}"
                            class="btn btn-success">

                            <i class="fa fa-plus"></i>

                            Tambah

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- Table --}}
    <div class="card shadow">

        <div class="card-header bg-dark text-white">

            <h5 class="mb-0">

                Daftar User

            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                    <tr>

                        <th width="60">
                            No
                        </th>

                        <th>
                            Nama
                        </th>

                        <th>
                            Email
                        </th>

                        <th width="120">
                            Role
                        </th>

                        <th width="180">
                            Dibuat
                        </th>

                        <th width="180">
                            Aksi
                        </th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($users as $user)

                        <tr>

                            <td>

                                {{ $loop->iteration + ($users->currentPage()-1) * $users->perPage() }}

                            </td>

                            <td>

                                <strong>

                                    {{ $user->name }}

                                </strong>

                            </td>

                            <td>

                                {{ $user->email }}

                            </td>

                            <td>

                                @if($user->role=='admin')

                                    <span class="badge bg-danger">

                                        Admin

                                    </span>

                                @else

                                    <span class="badge bg-success">

                                        Customer

                                    </span>

                                @endif

                            </td>

                            <td>

                                {{ $user->created_at->format('d M Y') }}

                            </td>

                            <td>

                                <a
                                    href="{{ route('admin.users.show',$user) }}"
                                    class="btn btn-info btn-sm">

                                    <i class="fa fa-eye"></i>

                                </a>

                                <a
                                    href="{{ route('admin.users.edit',$user) }}"
                                    class="btn btn-warning btn-sm">

                                    <i class="fa fa-edit"></i>

                                </a>

                                @if(auth()->id() != $user->id)

                                <form
                                    action="{{ route('admin.users.destroy',$user) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm">

                                        <i class="fa fa-trash"></i>

                                    </button>

                                </form>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="text-center py-5">

                                <img
                                    src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png"
                                    width="120">

                                <br><br>

                                Belum ada data user.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-4">

                {{ $users->links() }}

            </div>

        </div>

    </div>

</div>

@endsection