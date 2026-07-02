<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Meja;
use App\Models\Produk;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // =========================
        // ADMIN
        // =========================
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        // =========================
        // CUSTOMER
        // =========================
        User::updateOrCreate(
            ['email' => 'customer@gmail.com'],
            [
                'name' => 'Customer',
                'password' => Hash::make('customer123'),
                'role' => 'customer',
            ]
        );

        // =========================
        // KATEGORI
        // =========================
        $kopi = Kategori::updateOrCreate(
            ['nama' => 'Kopi']
        );

        $nonKopi = Kategori::updateOrCreate(
            ['nama' => 'Non Kopi']
        );

        $makanan = Kategori::updateOrCreate(
            ['nama' => 'Makanan']
        );

        // =========================
        // MEJA
        // =========================
        for ($i = 1; $i <= 10; $i++) {
            Meja::updateOrCreate(
                ['nomor_meja' => $i],
                [
                    'kapasitas' => 4,
                    'status' => 'Kosong',
                ]
            );
        }

        // =========================
        // PRODUK
        // =========================
        Produk::updateOrCreate(
            ['nama_produk' => 'Espresso'],
            [
                'kategori_id' => $kopi->id,
                'harga' => 18000,
                'stok' => 50,
                'deskripsi' => 'Espresso original.',
            ]
        );

        Produk::updateOrCreate(
            ['nama_produk' => 'Cappuccino'],
            [
                'kategori_id' => $kopi->id,
                'harga' => 25000,
                'stok' => 50,
                'deskripsi' => 'Cappuccino dengan foam lembut.',
            ]
        );

        Produk::updateOrCreate(
            ['nama_produk' => 'Latte'],
            [
                'kategori_id' => $kopi->id,
                'harga' => 27000,
                'stok' => 50,
                'deskripsi' => 'Latte susu segar.',
            ]
        );

        Produk::updateOrCreate(
            ['nama_produk' => 'Matcha Latte'],
            [
                'kategori_id' => $nonKopi->id,
                'harga' => 28000,
                'stok' => 40,
                'deskripsi' => 'Minuman matcha premium.',
            ]
        );

        Produk::updateOrCreate(
            ['nama_produk' => 'Chocolate'],
            [
                'kategori_id' => $nonKopi->id,
                'harga' => 24000,
                'stok' => 40,
                'deskripsi' => 'Chocolate hangat.',
            ]
        );

        Produk::updateOrCreate(
            ['nama_produk' => 'Kentang Goreng'],
            [
                'kategori_id' => $makanan->id,
                'harga' => 20000,
                'stok' => 30,
                'deskripsi' => 'Kentang goreng crispy.',
            ]
        );

        Produk::updateOrCreate(
            ['nama_produk' => 'Roti Bakar'],
            [
                'kategori_id' => $makanan->id,
                'harga' => 22000,
                'stok' => 25,
                'deskripsi' => 'Roti bakar coklat keju.',
            ]
        );
    }
}