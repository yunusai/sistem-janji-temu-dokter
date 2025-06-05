<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Obat::create([
            'nama_obat' => 'Paracetamol',
            'kemasan' => 'Tablet',
            'harga' => 5000,
        ]);

        \App\Models\Obat::create([
            'nama_obat' => 'Amoxicillin',
            'kemasan' => 'Kapsul',
            'harga' => 10000,
        ]);

        \App\Models\Obat::create([
            'nama_obat' => 'Ibuprofen',
            'kemasan' => 'Sirup',
            'harga' => 7500,
        ]);
    }
}
