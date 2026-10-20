<?php

namespace Database\Factories;

use App\Models\Promosi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Promosi>
 */
class PromosiFactory extends Factory
{
    protected $model = Promosi::class;

    public function definition(): array
    {
        return [
            'id_promosi' => fake()->unique()->numberBetween(1, 2147483647),
            'id_karyawan' => null,
            'jabatan_lama' => fake()->randomElement(['Staff', 'Operator', 'Analis', 'Admin']),
            'jabatan_baru' => fake()->randomElement(['Supervisor', 'Kepala Bagian', 'Koordinator', 'Manager']),
            'tanggal_promosi' => fake()->dateTimeBetween('-3 years', 'now')->format('Y-m-d'),
        ];
    }
}
