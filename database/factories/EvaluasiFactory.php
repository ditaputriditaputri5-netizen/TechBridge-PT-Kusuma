<?php

namespace Database\Factories;

use App\Models\Evaluasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Evaluasi>
 */
class EvaluasiFactory extends Factory
{
    protected $model = Evaluasi::class;

    public function definition(): array
    {
        return [
            'id_evaluasi' => fake()->unique()->numberBetween(1, 2147483647),
            'id_karyawan' => null,
            'tanggal_evaluasi' => fake()->dateTimeBetween('-3 years', 'now')->format('Y-m-d'),
            'hasil' => fake()->paragraph(),
        ];
    }
}
