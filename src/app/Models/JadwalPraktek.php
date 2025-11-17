<?php

namespace App\Models;

use App\Models\Dokter;
use App\Models\Poliklinik;
use Illuminate\Database\Eloquent\Model;

class JadwalPraktek extends Model
{
    protected $guarded = ['id'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class);
    }
}
