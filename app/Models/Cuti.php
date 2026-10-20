<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cuti';

    public $incrementing = false;

    public $timestamps = false;

    protected $keyType = 'int';

    // @dbml-sync:table-property
    protected $table = 'cuti';
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'id_cuti',
        'id_karyawan',
		'jenis_cuti',
		'tanggal_mulai',
		'tanggal_selesai',
		'alasan',
		'status',
		'id_manager',
		'tanggal_keputusan'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'tanggal_mulai' => 'date',
		'tanggal_selesai' => 'date',
		'tanggal_keputusan' => 'date'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    // @enddbml-sync:relations
}