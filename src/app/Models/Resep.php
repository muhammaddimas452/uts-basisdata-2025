<?php

namespace App\Models;

use App\Models\Kunjungan;
use App\Models\Obat;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $guarded = ['id'];

    /**
     * Get the kunjungan that owns the Resep
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kunjungan(): BelongsTo
    {
        return $this->belongsTo(Kunjungan::class);
    }

    /**
     * Get the obat that owns the Resep
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function obat(): BelongsTo
    {
        return $this->belongsTo(Obat::class);
    }
}
