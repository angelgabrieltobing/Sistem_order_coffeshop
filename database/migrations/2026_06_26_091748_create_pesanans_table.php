<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Nomor Pesanan
            |--------------------------------------------------------------------------
            */

            $table->string('nomor_pesanan')->unique();

            /*
            |--------------------------------------------------------------------------
            | Customer
            |--------------------------------------------------------------------------
            */

            $table->string('nama_pelanggan');

            /*
            |--------------------------------------------------------------------------
            | Relasi Meja
            |--------------------------------------------------------------------------
            */

            $table->foreignId('meja_id')
                  ->constrained('mejas')
                  ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | User Login (Opsional)
            |--------------------------------------------------------------------------
            */

            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Total Harga
            |--------------------------------------------------------------------------
            */

            $table->decimal('total_harga', 12, 2)->default(0);

            /*
            |--------------------------------------------------------------------------
            | Status Pesanan
            |--------------------------------------------------------------------------
            */

            $table->enum('status', [

                'Menunggu',

                'Diproses',

                'Selesai',

                'Dibatalkan',

            ])->default('Menunggu');

            /*
            |--------------------------------------------------------------------------
            | Pembayaran
            |--------------------------------------------------------------------------
            */

            $table->enum('status_pembayaran', [

                'Belum Bayar',

                'Lunas',

                'Refund',

            ])->default('Belum Bayar');

            /*
            |--------------------------------------------------------------------------
            | Metode Pembayaran
            |--------------------------------------------------------------------------
            */

            $table->enum('metode_pembayaran', [

                'Tunai',

                'Debit',

                'Kredit',

                'QRIS',

            ])->nullable();

            /*
            |--------------------------------------------------------------------------
            | Nominal Pembayaran
            |--------------------------------------------------------------------------
            */

            $table->decimal('jumlah_bayar', 12, 2)
                  ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Kembalian
            |--------------------------------------------------------------------------
            */

            $table->decimal('kembalian', 12, 2)
                  ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Catatan
            |--------------------------------------------------------------------------
            */

            $table->text('catatan')
                  ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Waktu
            |--------------------------------------------------------------------------
            */

            $table->timestamp('tanggal_pesanan')
                  ->nullable();

            $table->timestamp('bayar_pada')
                  ->nullable();

            $table->timestamp('selesai_pada')
                  ->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};