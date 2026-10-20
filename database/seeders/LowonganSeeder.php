<?php

namespace Database\Seeders;

use App\Models\Lowongan;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class LowonganSeeder extends Seeder
{
    public function run(): void
    {
        $targetCount = 500;
        $existingCount = Lowongan::query()->count();

        if ($existingCount >= $targetCount) {
            return;
        }

        $firstId = (int) Lowongan::query()->max('id_lowongan') + 1;

        Lowongan::factory()
            ->count($targetCount - $existingCount)
            ->sequence(fn (Sequence $sequence) => [
                'id_lowongan' => $firstId + $sequence->index,
            ])
            ->create();
    }
}
