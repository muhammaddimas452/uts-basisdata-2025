<?php

namespace App\Models;

use App\Models\RumahSakit;
use App\Models\Poliklinik;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $guarded = ['id'];

    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class);
    }

    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class);
    }
}
