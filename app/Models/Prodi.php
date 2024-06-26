<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'prodis';
    public $timestamps = false;

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_kode', 'kode');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'prodi_id', 'id');
    }
}
