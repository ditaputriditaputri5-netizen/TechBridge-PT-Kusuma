<?php

namespace Database\Factories;

use App\Models\Pelamar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pelamar>
 */
class PelamarFactory extends Factory
{
    protected $model = Pelamar::class;

    public function definition(): array
    {
        return [
            'id_pelamar' => fake()->unique()->numberBetween(1, 2147483647),
            'nama' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'no_hp' => fake()->numerify('08##########'),
            'cv' => fake()->optional(0.8)->url(),
        ];
    }
}
