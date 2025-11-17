<?php

namespace App\Models;

use App\Models\RumahSakit;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $guarded = ['id'];

    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class);
    }
}
