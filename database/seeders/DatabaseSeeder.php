<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Ulasan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            KategoriSeeder::class,
            ProdukSeeder::class,
            ArtikelSeeder::class,
            TipeUlasanSeeder::class,
            UlasanSeeder::class,
            PelatihanSeeder::class,
            DetailPelatihanSeeder::class
        ]);
    }
}