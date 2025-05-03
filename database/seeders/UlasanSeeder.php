<?php

namespace Database\Seeders;

use App\Models\Ulasan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UlasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Ulasan::create([
                'isi' => $faker->paragraph(3),
                'user_id' => 2,
            ]);
        }
    }
}