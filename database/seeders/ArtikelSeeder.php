<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Artikel;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $admin = User::where('role', 'admin')->first();
        if (!$admin) {
            $this->command->error('Tidak ada user dengan role admin!');
            return;
        }   
        for ($i = 0; $i < 10; $i++) {
            $judul = $faker->sentence(6);

            Artikel::create([
                'judul' => $judul,
                'slug' => Str::slug($judul),
                'isi' => $faker->paragraphs(5, true),
                'user_id' => $admin->id,
            ]);
        }
    }
}