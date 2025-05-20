<?php

namespace Database\Seeders;

use App\Models\TipeUlasan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipeUlasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipeUlasan::create(['nama' => 'produk']);
        TipeUlasan::create(['nama' => 'pelatihan']);
    }
}