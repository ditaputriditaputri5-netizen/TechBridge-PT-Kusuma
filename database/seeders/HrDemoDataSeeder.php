<?php

namespace Database\Seeders;

use App\Models\Cuti;
use App\Models\Evaluasi;
use App\Models\Gaji;
use App\Models\Karyawan;
use App\Models\Lamaran;
use App\Models\Pelamar;
use App\Models\Promosi;
use App\Models\Seleksi;
use App\Models\Training;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class HrDemoDataSeeder extends Seeder
{
    private const CHUNK_SIZE = 500;

    public function run(): void
    {
        $this->call(LowonganSeeder::class);

        $lowonganIds = $this->ids('lowongan', 'id_lowongan');
        $pelamarIds = $this->seedModel(Pelamar::class, 'pelamar', 'id_pelamar', 25000);
        $lamaranIds = $this->seedModel(Lamaran::class, 'lamaran', 'id_lamaran', 20000, [
            'id_pelamar' => $pelamarIds,
            'id_lowongan' => $lowonganIds,
        ]);
        $this->seedModel(Training::class, 'training', 'id_training', 5000, [
            'id_pelamar' => $pelamarIds,
        ]);
        $karyawanIds = $this->seedModel(Karyawan::class, 'karyawan', 'id_karyawan', 8000, [
            'id_pelamar' => $pelamarIds,
        ]);
        $this->seedModel(Seleksi::class, 'seleksi', 'id_seleksi', 12000, [
            'id_lamaran' => $lamaranIds,
        ]);
        $this->seedModel(Evaluasi::class, 'evaluasi', 'id_evaluasi', 6000, [
            'id_karyawan' => $karyawanIds,
        ]);
        $this->seedModel(Promosi::class, 'promosi', 'id_promosi', 2500, [
            'id_karyawan' => $karyawanIds,
        ]);
        $this->seedModel(Gaji::class, 'gaji', 'id_gaji', 16000, [
            'id_karyawan' => $karyawanIds,
        ]);
        $this->seedModel(Cuti::class, 'cuti', 'id_cuti', 5000, [
            'id_karyawan' => $karyawanIds,
        ]);
    }

    /**
     * @param array<string, array<int, int>> $foreignKeyPools
     * @return array<int, int>
     */
    private function seedModel(
        string $modelClass,
        string $table,
        string $primaryKey,
        int $targetCount,
        array $foreignKeyPools = []
    ): array {
        $currentCount = (int) DB::table($table)->count();
        $remaining = max(0, $targetCount - $currentCount);
        $nextId = (int) DB::table($table)->max($primaryKey) + 1;

        while ($remaining > 0) {
            $batchSize = min(self::CHUNK_SIZE, $remaining);
            $models = $modelClass::factory()->count($batchSize)->make();
            $rows = [];

            foreach ($models as $offset => $model) {
                $row = $model->getAttributes();
                $row[$primaryKey] = $nextId + $offset;

                foreach ($foreignKeyPools as $foreignKey => $ids) {
                    if ($ids === []) {
                        throw new RuntimeException("No parent IDs available for {$table}.{$foreignKey}.");
                    }

                    $row[$foreignKey] = $ids[array_rand($ids)];
                }

                $rows[] = $row;
            }

            DB::table($table)->insert($rows);
            $nextId += $batchSize;
            $remaining -= $batchSize;
        }

        return $this->ids($table, $primaryKey);
    }

    /**
     * @return array<int, int>
     */
    private function ids(string $table, string $primaryKey): array
    {
        return DB::table($table)
            ->orderBy($primaryKey)
            ->pluck($primaryKey)
            ->map(static fn ($id): int => (int) $id)
            ->all();
    }
}
