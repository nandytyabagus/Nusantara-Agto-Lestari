<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pelatihan;
use Faker\Factory as Faker;
use App\Models\DetailPelatihan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailPelatihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        $pelatihanIds = Pelatihan::pluck('id')->toArray();
        
        for ($i = 0; $i < 10; $i++) {
            DetailPelatihan::create([
                'user_id' => 2, 
                'pelatihan_id' => $faker->randomElement($pelatihanIds),
                'status' => $faker->randomElement(['pending', 'lunas']),
            ]);
        }
    }
}