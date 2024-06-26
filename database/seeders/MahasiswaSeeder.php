<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 3 mahasiswa
        Mahasiswa::create([
            'nama' => 'John Doe',
            'nim' => '105124',
            'fakultas_id' => 5,
            'prodi_id' => 1,
            'updated_at' => '2024-06-24 08:16:48',
            'created_at' => '2024-06-24 08:16:48'
        ]);

        Mahasiswa::create([
            'nama' => 'Jane Doe',
            'nim' => '106124',
            'fakultas_id' => 5,
            'prodi_id' => 2,
            'updated_at' => '2024-06-24 08:16:48',
            'created_at' => '2024-06-24 08:16:48'
        ]);

        // Mahasiswa::Factory(20);
    }
}
