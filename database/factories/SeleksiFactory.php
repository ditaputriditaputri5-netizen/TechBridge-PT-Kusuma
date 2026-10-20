<?php

namespace Database\Factories;

use App\Models\Seleksi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Seleksi>
 */
class SeleksiFactory extends Factory
{
    protected $model = Seleksi::class;

    public function definition(): array
    {
        return [
            'id_seleksi' => fake()->unique()->numberBetween(1, 2147483647),
            'id_lamaran' => null,
            'tanggal_seleksi' => fake()->dateTimeBetween('-3 years', 'now')->format('Y-m-d'),
            'hasil' => fake()->randomElement(['Lulus', 'Tidak Lulus', 'Menunggu']),
        ];
    }
}
