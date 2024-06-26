<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    public function Fakultas(): BelongsTo
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function Prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class);
    }
}
