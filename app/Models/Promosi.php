<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promosi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_promosi';

    public $incrementing = false;

    public $timestamps = false;

    protected $keyType = 'int';

    // @dbml-sync:table-property
    protected $table = 'promosi';
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'id_promosi',
        'id_karyawan',
		'jabatan_lama',
		'jabatan_baru',
		'tanggal_promosi'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'tanggal_promosi' => 'date'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    // @enddbml-sync:relations
}