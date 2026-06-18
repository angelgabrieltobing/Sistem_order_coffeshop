@extends('layouts.customer')

@section('content')

<!-- HERO -->
<section class="hero d-flex align-items-center">

    <div class="container text-center">

        <h1 class="display-3 fw-bold">
            Nikmati Kopi Terbaik
        </h1>

        <p class="lead mt-3">
            Dibuat dari biji kopi pilihan dengan cita rasa premium.
        </p>

        <a href="#menu" class="btn btn-warning btn-lg mt-3">
            Lihat Menu
        </a>

    </div>

</section>

<!-- MENU -->
<section id="menu" class="py-5">

    <div class="container">

        <h2 class="text-center mb-5">
            Menu Favorit
        </h2>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="card menu-card shadow">

                    <img
                        src="https://images.unsplash.com/photo-1511920170033-f8396924c348"
                        class="card-img-top"
                        height="250">

                    <div class="card-body text-center">

                        <h4>Espresso</h4>

                        <p>
                            Kopi hitam pekat dengan aroma kuat.
                        </p>

                        <div class="price">
                            Rp 20.000
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card menu-card shadow">

                    <img
                        src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085"
                        class="card-img-top"
                        height="250">

                    <div class="card-body text-center">

                        <h4>Cappuccino</h4>

                        <p>
                            Perpaduan espresso dan susu creamy.
                        </p>

                        <div class="price">
                            Rp 25.000
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card menu-card shadow">

                    <img
                        src="https://images.unsplash.com/photo-1504754524776-8f4f37790ca0"
                        class="card-img-top"
                        height="250">

                    <div class="card-body text-center">

                        <h4>Latte</h4>

                        <p>
                            Kopi lembut dengan rasa susu yang kaya.
                        </p>

                        <div class="price">
                            Rp 28.000
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center p-4">

    <h5>☕ Coffee Shop</h5>

    <p>
        Jl. Kopi Nusantara No. 10 Medan
    </p>

</footer>

@endsection