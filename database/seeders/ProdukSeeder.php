<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Produk::create([
                'nama' => 'Kambing ' . $faker->word(),
                'deskripsi' => $faker->paragraph(3),
                'harga' => $faker->numberBetween(3000000, 7000000),
                'kategori_id' => 1,
            ]);
        }
    }
}