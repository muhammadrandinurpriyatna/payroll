<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pegawai::create([
            'name' => 'Pegawai 1',
            'nip' => '1001',
            'email' => 'pegawai1@example.com',
            'password' => bcrypt('Pegawai1*123'),
        ]);
        
        Pegawai::create([
            'name' => 'Pegawai 2',
            'nip' => '1002',
            'email' => 'pegawai2@example.com',
            'password' => bcrypt('Pegawai*123'),
        ]);
        
        Pegawai::create([
            'name' => 'Pegawai 3',
            'nip' => '1003',
            'email' => 'pegawai3@example.com',
            'password' => bcrypt('Pegawai*123'),
        ]);
    }
}