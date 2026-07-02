<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // SQLite tidak mendukung DROP CONSTRAINT langsung
        // Alternatif: rename tabel, buat ulang tanpa constraint
        Schema::table('mejas', function (Blueprint $table) {
            // Untuk SQLite, lebih mudah re-create tabel
        });
    }

    public function down(): void
    {
        // Rollback
    }
};