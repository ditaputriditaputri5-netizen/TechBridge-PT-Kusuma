<?php

namespace Database\Factories;

use App\Models\Cuti;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cuti>
 */
class CutiFactory extends Factory
{
    protected $model = Cuti::class;

    public function definition(): array
    {
        $tanggalMulai = fake()->dateTimeBetween('-2 years', 'now');
        $tanggalSelesai = (clone $tanggalMulai)->modify('+'.fake()->numberBetween(1, 14).' days');

        return [
            'id_cuti' => fake()->unique()->numberBetween(1, 2147483647),
            'id_karyawan' => null,
            'jenis_cuti' => fake()->randomElement(['Tahunan', 'Sakit', 'Melahirkan', 'Penting']),
            'tanggal_mulai' => $tanggalMulai->format('Y-m-d'),
            'tanggal_selesai' => $tanggalSelesai->format('Y-m-d'),
            'alasan' => fake()->sentence(),
            'status' => fake()->randomElement(['Diajukan', 'Disetujui', 'Ditolak']),
            'id_manager' => null,
            'tanggal_keputusan' => fake()->dateTimeBetween($tanggalMulai, 'now')->format('Y-m-d'),
        ];
    }
}
