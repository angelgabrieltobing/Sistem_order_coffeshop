<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Struk Pesanan</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>

        body{

            background:#f5f5f5;

        }

        .receipt{

            max-width:700px;

            margin:40px auto;

            background:white;

            padding:35px;

            border-radius:10px;

            box-shadow:0 0 20px rgba(0,0,0,.08);

        }

        table td,
        table th{

            vertical-align:middle;

        }

        @media print{

            .no-print{

                display:none;

            }

            body{

                background:white;

            }

            .receipt{

                box-shadow:none;

                margin:0;

                max-width:100%;

            }

        }

    </style>

</head>

<body>

<div class="receipt">

    <div class="text-center mb-4">

        <h2 class="fw-bold">

            ☕

            Coffee Shop

        </h2>

        <p class="text-muted mb-0">

            Struk Pembayaran

        </p>

        <hr>

    </div>

    <div class="row mb-3">

        <div class="col-md-6">

            <strong>Nomor Pesanan</strong>

            <br>

            {{ $pesanan->nomor_pesanan }}

        </div>

        <div class="col-md-6 text-md-end">

            <strong>Tanggal</strong>

            <br>

            {{ optional($pesanan->tanggal_pesanan)->format('d M Y H:i') }}

        </div>

    </div>

    <div class="row mb-3">

        <div class="col-md-6">

            <strong>Nama Customer</strong>

            <br>

            {{ $pesanan->nama_pelanggan }}

        </div>

        <div class="col-md-6 text-md-end">

            <strong>Nomor Meja</strong>

            <br>

            {{ optional($pesanan->meja)->nomor_meja ?? '-' }}

        </div>

    </div>

    <table class="table table-bordered">

        <thead class="table-dark">

            <tr>

                <th>No</th>

                <th>Menu</th>

                <th>Qty</th>

                <th>Harga</th>

                <th>Subtotal</th>

            </tr>

        </thead>

        <tbody>

            @foreach($pesanan->itemPesanans as $item)

                <tr>

                    <td>

                        {{ $loop->iteration }}

                    </td>

                    <td>

                        {{ optional($item->menu)->nama ?? 'Menu telah dihapus' }}

                    </td>

                    <td>

                        {{ $item->qty }}

                    </td>

                    <td>

                        Rp {{ number_format($item->harga,0,',','.') }}

                    </td>

                    <td>

                        Rp {{ number_format($item->subtotal,0,',','.') }}

                    </td>

                </tr>

            @endforeach

        </tbody>

        <tfoot>

            <tr>

                <th colspan="4" class="text-end">

                    Total

                </th>

                <th>

                    Rp {{ number_format($pesanan->total_harga,0,',','.') }}

                </th>

            </tr>

        </tfoot>

    </table>

    <div class="row mt-4">

        <div class="col-md-6">

            <strong>Status Pesanan</strong>

            <br>

            {{ $pesanan->status }}

        </div>

        <div class="col-md-6 text-md-end">

            <strong>Status Pembayaran</strong>

            <br>

            {{ $pesanan->status_pembayaran }}

        </div>

    </div>

    <div class="row mt-3">

        <div class="col-md-6">

            <strong>Metode Pembayaran</strong>

            <br>

            {{ $pesanan->metode_pembayaran }}

        </div>

        <div class="col-md-6 text-md-end">

            @if($pesanan->bayar_pada)

                <strong>Waktu Pembayaran</strong>

                <br>

                {{ $pesanan->bayar_pada->format('d M Y H:i') }}

            @endif

        </div>

    </div>

    @if($pesanan->catatan)

        <div class="alert alert-light mt-4">

            <strong>Catatan</strong>

            <br>

            {{ $item->qty }}

        </div>

    @endif

    <div class="text-center mt-5">

        <h5>

            Terima Kasih

        </h5>

        <small class="text-muted">

            Terima kasih telah berbelanja di Coffee Shop.

        </small>

    </div>

    <hr>

    <div class="d-flex justify-content-between no-print">

        <a
            href="{{ route('customer.pesanan.show',$pesanan) }}"
            class="btn btn-secondary">

            <i class="fa-solid fa-arrow-left"></i>

            Kembali

        </a>

        <button
            onclick="window.print()"
            class="btn btn-success">

            <i class="fa-solid fa-print"></i>

            Cetak Struk

        </button>

    </div>

</div>

</body>

</html>