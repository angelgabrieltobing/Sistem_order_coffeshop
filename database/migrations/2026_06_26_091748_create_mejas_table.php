<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mejas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_meja')->unique();
            $table->integer('kapasitas')->default(4);
            $table->enum('status', ['tersedia', 'terisi', 'reservasi'])->default('tersedia');
            $table->string('qr_code')->nullable();
            $table->string('lokasi')->nullable();
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mejas');
    }
};