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
        /*
        |--------------------------------------------------------------------------
        | Hapus tabel lama
        |--------------------------------------------------------------------------
        */

        Schema::dropIfExists('item_pesanans');

        /*
        |--------------------------------------------------------------------------
        | Buat tabel baru
        |--------------------------------------------------------------------------
        */

        Schema::create('item_pesanans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('pesanan_id')
                ->constrained('pesanans')
                ->cascadeOnDelete();

            $table->foreignId('menu_id')
                ->constrained('menus')
                ->cascadeOnDelete();

            $table->integer('jumlah');

            $table->decimal('harga', 12, 2);

            $table->decimal('subtotal', 12, 2);

            $table->text('catatan')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_pesanans');
    }
};