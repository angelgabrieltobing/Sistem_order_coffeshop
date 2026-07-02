<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Meja;

class MejaSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Meja::create([
                'nomor_meja' => $i,
                'kapasitas' => 4,
                'status' => 'tersedia',
            ]);
        }
    }
}