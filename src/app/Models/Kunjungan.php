<?php

namespace App\Models;

use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $guarded = ['id'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
    /**
     * Get the dokter that owns the Kunjungan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
