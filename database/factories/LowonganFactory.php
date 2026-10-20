<?php

namespace Database\Factories;

use App\Models\Lowongan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lowongan>
 */
class LowonganFactory extends Factory
{
    protected $model = Lowongan::class;

    public function definition(): array
    {
        return [
            'id_lowongan' => fake()->unique()->numberBetween(1, 2147483647),
            'posisi' => fake()->randomElement([
                'Staff Administrasi',
                'Staff HRD',
                'Staff Keuangan',
                'Operator Produksi',
                'Quality Control',
                'Marketing Executive',
                'IT Support',
                'Supervisor Gudang',
            ]),
            'deskripsi' => fake()->paragraph(),
            'persyaratan' => fake()->paragraph(2),
            'tanggal_buka' => fake()->dateTimeBetween('-3 months', '+1 month')->format('Y-m-d'),
            'status' => fake()->randomElement(['Dibuka', 'Ditutup', 'Seleksi']),
        ];
    }
}
