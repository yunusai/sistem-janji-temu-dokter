<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $polis = [
            ['nama' => 'Penyakit Dalam', 'deskripsi' => 'Pelayanan kesehatan umum untuk semua pasien.'],
            ['nama' => 'Anak', 'deskripsi' => 'Pelayanan kesehatan khusus untuk anak-anak.'],
            ['nama' => 'Gigi', 'deskripsi' => 'Pelayanan kesehatan gigi dan mulut.'],
            ['nama' => 'Kebidanan dan Kandungan', 'deskripsi' => 'Pelayanan kesehatan ibu dan anak.'],
            ['nama' => 'THT', 'deskripsi' => 'Pelayanan kesehatan telinga, hidung, dan tenggorokan.'],
            ['nama' => 'Mata', 'deskripsi' => 'Pelayanan kesehatan mata.'],
        ];
        foreach ($polis as $poli) {
            \App\Models\Poli::create($poli);
        }
    }
}
