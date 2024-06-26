<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $prodiIds = \App\Models\Prodi::pluck('id')->toArray();
        $fakultasIds = \App\Models\Fakultas::pluck('id')->toArray();

        return [
            'nim' => '10' . \App\Models\Fakultas::find($this->faker->randomElement($fakultasIds))->kode . \App\Models\Prodi::find($this->faker->randomElement($prodiIds))->kode . '24' . str_pad(\App\Models\Mahasiswa::where('nim', 'like', '10' . \App\Models\Fakultas::find($this->faker->randomElement($fakultasIds))->kode 
            . \App\Models\Prodi::find($this->faker->randomElement($prodiIds))->kode . '24' . '%')->count() + 1, 3, '0', STR_PAD_LEFT),
            'nama' => $this->faker->name(),
            'fakultas_id' => $this->faker->randomElement($fakultasIds),
            'prodi_id' => $this->faker->randomElement($prodiIds),
        ];
    }
}
