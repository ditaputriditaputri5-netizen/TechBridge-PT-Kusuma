<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_lamaran';

    public $incrementing = false;

    public $timestamps = false;

    protected $keyType = 'int';

    // @dbml-sync:table-property
    protected $table = 'lamaran';
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'id_lamaran',
        'id_pelamar',
		'id_lowongan',
		'tanggal_lamaran',
		'status'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'tanggal_lamaran' => 'date'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class, 'id_pelamar', 'id_pelamar');
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan', 'id_lowongan');
    }

    public function seleksis()
    {
        return $this->hasMany(Seleksi::class, 'id_lamaran', 'id_lamaran');
    }

    // @enddbml-sync:relations
}