<?php

namespace Database\Seeders;

use App\Models\Pelatihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PelatihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {

            $waktuPelaksanaan = $faker->dateTimeBetween('+3 days', '+3 months');
            $batasPendaftaran = (clone $waktuPelaksanaan)->modify('-3 days');

            Pelatihan::create([
                'judul_pelatihan' => $faker->sentence(3),
                'deskripsi' => $faker->paragraph(3),
                'waktu_pelaksanaan' => $waktuPelaksanaan->format('Y-m-d H:i:s'),
                'batas_pendaftaran' => $batasPendaftaran->format('Y-m-d H:i:s'),
                'lokasi' => $faker->city,
                'kuota' => $faker->numberBetween(10, 100),
            ]);
        }
    }
}