<?php

namespace Database\Factories;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Karyawan>
 */
class KaryawanFactory extends Factory
{
    protected $model = Karyawan::class;

    public function definition(): array
    {
        return [
            'id_karyawan' => fake()->unique()->numberBetween(1, 2147483647),
            'id_pelamar' => null,
            'nama' => fake()->name(),
            'jabatan' => fake()->randomElement([
                'Staff Administrasi',
                'Staff HRD',
                'Staff Keuangan',
                'Operator Produksi',
                'Quality Control',
                'Marketing Executive',
                'IT Support',
                'Supervisor Gudang',
            ]),
            'tanggal_masuk' => fake()->dateTimeBetween('-10 years', 'now')->format('Y-m-d'),
        ];
    }
}
