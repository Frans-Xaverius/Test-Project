<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    public function fakultas_id(): BelongsTo
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function prodi_id(): BelongsTo
    {
        return $this->belongsTo(Prodi::class);
    }
}
