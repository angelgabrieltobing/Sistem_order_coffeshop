<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pesanan')->unique();
            $table->string('nama_pelanggan');
            $table->foreignId('meja_id')->constrained('mejas')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->decimal('total_harga', 10, 2);
            $table->enum('status', ['menunggu', 'proses', 'selesai', 'batal'])->default('menunggu');
            $table->enum('status_pembayaran', ['belum_bayar', 'lunas', 'refund'])->default('belum_bayar');
            $table->enum('metode_pembayaran', ['tunai', 'debit', 'kredit', 'qris'])->nullable();
            $table->decimal('jumlah_bayar', 10, 2)->nullable();
            $table->decimal('kembalian', 10, 2)->nullable();
            $table->text('catatan')->nullable();
            $table->timestamp('tanggal_pesanan')->nullable();
            $table->timestamp('selesai_pada')->nullable();
            $table->timestamp('bayar_pada')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
};