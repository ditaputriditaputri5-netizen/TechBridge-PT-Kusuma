<?php

namespace Database\Factories;

use App\Models\Gaji;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Gaji>
 */
class GajiFactory extends Factory
{
    protected $model = Gaji::class;

    public function definition(): array
    {
        return [
            'id_gaji' => fake()->unique()->numberBetween(1, 2147483647),
            'id_karyawan' => null,
            'nominal' => fake()->randomFloat(2, 100000, 999999),
            'periode' => fake()->date('Y-m'),
        ];
    }
}
