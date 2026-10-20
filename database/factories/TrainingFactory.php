<?php

namespace Database\Factories;

use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Training>
 */
class TrainingFactory extends Factory
{
    protected $model = Training::class;

    public function definition(): array
    {
        return [
            'id_training' => fake()->unique()->numberBetween(1, 2147483647),
            'id_pelamar' => null,
            'tanggal_training' => fake()->dateTimeBetween('-3 years', 'now')->format('Y-m-d'),
            'hasil' => fake()->randomElement(['Lulus', 'Tidak Lulus', 'Menunggu']),
        ];
    }
}
