<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;
    protected $table = 'fakultas';
    public $timestamps = false;

    public function prodi()
    {
        return $this->hasMany(Prodi::class, 'fakultas_kode', 'kode');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'fakultas_id');
    }
}
