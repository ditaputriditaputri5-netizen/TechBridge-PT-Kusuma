<?php

namespace Database\Factories;

use App\Models\Lamaran;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lamaran>
 */
class LamaranFactory extends Factory
{
    protected $model = Lamaran::class;

    public function definition(): array
    {
        return [
            'id_lamaran' => fake()->unique()->numberBetween(1, 2147483647),
            'id_pelamar' => null,
            'id_lowongan' => null,
            'tanggal_lamaran' => fake()->dateTimeBetween('-3 years', 'now')->format('Y-m-d'),
            'status' => fake()->randomElement(['Dikirim', 'Diproses', 'Diterima', 'Ditolak']),
        ];
    }
}
