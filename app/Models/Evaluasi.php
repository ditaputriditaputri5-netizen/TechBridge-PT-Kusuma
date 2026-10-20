<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_evaluasi';

    public $incrementing = false;

    public $timestamps = false;

    protected $keyType = 'int';

    // @dbml-sync:table-property
    protected $table = 'evaluasi';
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'id_evaluasi',
        'id_karyawan',
		'tanggal_evaluasi',
		'hasil'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'tanggal_evaluasi' => 'date'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    // @enddbml-sync:relations
}