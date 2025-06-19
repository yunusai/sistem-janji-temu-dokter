<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'role' => 'pasien',
            'alamat' => 'Jl. Contoh Alamat No. 1',
            'no_ktp' => '1234567890123456',
            'no_hp' => '081234567890',
            'no_rm' => 'RM001',
        ]);

        \App\Models\User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'),
            'role' => 'pasien',
            'alamat' => 'Jl. Contoh Alamat No. 2',
            'no_ktp' => '1234567890123457',
            'no_hp' => '081234567891',
            'no_rm' => 'RM002',
        ]);

        \App\Models\User::create([
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'password' => bcrypt('password'),
            'role' => 'pasien',
            'alamat' => 'Jl. Contoh Alamat No. 3',
            'no_ktp' => '1234567890123458',
            'no_hp' => '081234567892',
            'no_rm' => 'RM003',
        ]);
    }
}
