<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                'nama' => 'Espresso',
                'kategori' => 'Coffee',
                'harga' => 25000,
                'deskripsi' => 'Kopi hitam pekat dengan aroma khas',
                'is_available' => true,
                'gambar' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?w=400&h=300&fit=crop',
            ],
            [
                'nama' => 'Cappuccino',
                'kategori' => 'Coffee',
                'harga' => 35000,
                'deskripsi' => 'Kopi dengan busa susu yang lembut',
                'is_available' => true,
                'gambar' => 'https://images.unsplash.com/photo-1572442388796-11668a67e53d?w=400&h=300&fit=crop',
            ],
            [
                'nama' => 'Latte',
                'kategori' => 'Coffee',
                'harga' => 38000,
                'deskripsi' => 'Espresso dengan susu steamed',
                'is_available' => true,
                'gambar' => 'https://images.unsplash.com/photo-1534687941688-6510e6d6bc8c?w=400&h=300&fit=crop',
            ],
            [
                'nama' => 'Matcha Latte',
                'kategori' => 'Non-Coffee',
                'harga' => 40000,
                'deskripsi' => 'Minuman matcha dengan susu',
                'is_available' => true,
                'gambar' => 'https://images.unsplash.com/photo-1556881286-fc6915169721?w=400&h=300&fit=crop',
            ],
            [
                'nama' => 'Chocolate Croissant',
                'kategori' => 'Food',
                'harga' => 28000,
                'deskripsi' => 'Croissant dengan isian coklat',
                'is_available' => true,
                'gambar' => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=400&h=300&fit=crop',
            ],
            [
                'nama' => 'Cheesecake',
                'kategori' => 'Dessert',
                'harga' => 32000,
                'deskripsi' => 'Kue keju lembut dengan topping berry',
                'is_available' => true,
                'gambar' => 'https://images.unsplash.com/photo-1524351199670-7a35b0caa5b2?w=400&h=300&fit=crop',
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}