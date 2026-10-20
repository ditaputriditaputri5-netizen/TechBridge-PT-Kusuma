<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_gaji';

    public $incrementing = false;

    public $timestamps = false;

    protected $keyType = 'int';

    // @dbml-sync:table-property
    protected $table = 'gaji';
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'id_gaji',
        'id_karyawan',
		'nominal',
		'periode'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'nominal' => 'float'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    // @enddbml-sync:relations
}