<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pelamar';

    public $incrementing = false;

    public $timestamps = false;

    protected $keyType = 'int';

    // @dbml-sync:table-property
    protected $table = 'pelamar';
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'id_pelamar',
        'nama',
		'email',
		'no_hp',
		'cv'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function lamarans()
    {
        return $this->hasMany(Lamaran::class, 'id_pelamar', 'id_pelamar');
    }

    public function trainings()
    {
        return $this->hasMany(Training::class, 'id_pelamar', 'id_pelamar');
    }

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class, 'id_pelamar', 'id_pelamar');
    }

    // @enddbml-sync:relations
}