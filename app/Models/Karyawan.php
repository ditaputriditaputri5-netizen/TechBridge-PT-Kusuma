<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    protected $table = 'karyawan';
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'id_pelamar',
		'nama',
		'jabatan',
		'tanggal_masuk'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'tanggal_masuk' => 'date'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class, 'id_pelamar', 'id_pelamar');
    }

    public function evaluasis()
    {
        return $this->hasMany(Evaluasi::class, 'id_karyawan', 'id_karyawan');
    }

    public function promosis()
    {
        return $this->hasMany(Promosi::class, 'id_karyawan', 'id_karyawan');
    }

    public function gajis()
    {
        return $this->hasMany(Gaji::class, 'id_karyawan', 'id_karyawan');
    }

    public function cutis()
    {
        return $this->hasMany(Cuti::class, 'id_karyawan', 'id_karyawan');
    }

    // @enddbml-sync:relations
}