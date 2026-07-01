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
        | Buat ulang tabel item_pesanans
        |--------------------------------------------------------------------------
        */

        Schema::create('item_pesanans', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Relasi Pesanan
            |--------------------------------------------------------------------------
            */

            $table->foreignId('pesanan_id')
                ->constrained('pesanans')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Relasi Menu
            |--------------------------------------------------------------------------
            */

            $table->foreignId('menu_id')
                ->constrained('menus')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Jumlah Item
            |--------------------------------------------------------------------------
            */

            $table->integer('qty');

            /*
            |--------------------------------------------------------------------------
            | Harga
            |--------------------------------------------------------------------------
            */

            $table->decimal('harga', 12, 2);

            /*
            |--------------------------------------------------------------------------
            | Subtotal
            |--------------------------------------------------------------------------
            */

            $table->decimal('subtotal', 12, 2);

            /*
            |--------------------------------------------------------------------------
            | Catatan
            |--------------------------------------------------------------------------
            */

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