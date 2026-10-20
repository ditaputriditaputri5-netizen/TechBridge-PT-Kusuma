<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_lowongan';

    public $incrementing = false;

    public $timestamps = false;

    protected $keyType = 'int';

    // @dbml-sync:table-property
    protected $table = 'lowongan';
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'id_lowongan',
        'posisi',
		'deskripsi',
		'persyaratan',
		'tanggal_buka',
		'status'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'tanggal_buka' => 'date'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function lamarans()
    {
        return $this->hasMany(Lamaran::class, 'id_lowongan', 'id_lowongan');
    }

    // @enddbml-sync:relations
}