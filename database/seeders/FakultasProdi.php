<?php

namespace Database\Seeders;

use App\Models\Prodi;
use App\Models\Fakultas;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

        $prodiIds = Prodi::pluck('id')->toArray();
        $fakultasIds = Fakultas::pluck('id')->toArray();


        return Mahasiswa::factory()
            ->count(100)
            ->make()
            ->each(function ($mahasiswa) use ($prodiIds, $fakultasIds) {
                $mahasiswa->fakultas_id = array_rand(array_flip($fakultasIds));
                $mahasiswa->prodi_id = array_rand(array_flip($prodiIds));
                $mahasiswa->nim = '10' . Fakultas::find($mahasiswa->fakultas_id)->kode . Prodi::find($mahasiswa->prodi_id)->kode . '24' 
                . str_pad(Mahasiswa::where('nim', 'like', '10' . Fakultas::find($mahasiswa->fakultas_id)->kode . Prodi::find($mahasiswa->prodi_id)->kode . '24' . '%')->count() + 1, 3, '0', STR_PAD_LEFT);
                $mahasiswa->save();
            });
    }
}
