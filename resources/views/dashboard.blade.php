@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card shadow border-0 rounded-4">

                <div class="card-header bg-dark text-white">

                    <h3 class="mb-0">

                        Dashboard

                    </h3>

                </div>

                <div class="card-body">

                    <div class="alert alert-success">

                        <h5>

                            Selamat Datang,

                            {{ Auth::user()->name }}

                        </h5>

                        <p class="mb-0">

                            Anda berhasil login ke sistem Coffee Shop.

                        </p>

                    </div>

                    <div class="row mt-4">

                        <div class="col-md-4 mb-3">

                            <div class="card border-0 shadow-sm">

                                <div class="card-body text-center">

                                    <i class="fa-solid fa-mug-hot fa-3x text-warning mb-3"></i>

                                    <h5>

                                        Menu

                                    </h5>

                                    <a href="{{ route('menu') }}"
                                       class="btn btn-primary">

                                        Lihat Menu

                                    </a>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-4 mb-3">

                            <div class="card border-0 shadow-sm">

                                <div class="card-body text-center">

                                    <i class="fa-solid fa-user fa-3x text-success mb-3"></i>

                                    <h5>

                                        Profil

                                    </h5>

                                    <p>

                                        {{ Auth::user()->email }}

                                    </p>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-4 mb-3">

                            <div class="card border-0 shadow-sm">

                                <div class="card-body text-center">

                                    <i class="fa-solid fa-right-from-bracket fa-3x text-danger mb-3"></i>

                                    <h5>

                                        Logout

                                    </h5>

                                    <form
                                        method="POST"
                                        action="{{ route('logout') }}">

                                        @csrf

                                        <button
                                            class="btn btn-danger">

                                            Logout

                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection