<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create(['nama' => 'Kambing']);
        Kategori::create(['nama' => 'Susu']);
        Kategori::create(['nama' => 'Pakan Ternak']);
        Kategori::create(['nama' => 'Pupuk']);
    }
}