<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fakultas;
use App\Models\Prodi;

class FakultasProdi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        $fakultas = [
            6 => [
                'nama' => 'Fakultas Komunikasi dan Diplomasi',
                'prodi' => [
                    1 => 'Komunikasi', 
                    2 => 'Hubungan Internasional',
                ],
            ],
            5 => [
                'nama' => 'Fakultas Sains dan Komputer',
                'prodi' => [
                    1 => 'Kimia',
                    2 => 'Ilmu Komputer',
                ],
            ],
        ];

        foreach ($fakultas as $k => $f) {

            Fakultas::create([
                'nama' => $f['nama'],
                'kode' => $k,
            ]);

            foreach ($f['prodi'] as $i => $p) {

                Prodi::create([
                    'fakultas_kode' => $k,
                    'nama' => $p,
                    'kode' => $i,
                ]);
            }
        }   
    }
}
