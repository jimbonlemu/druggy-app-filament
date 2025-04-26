<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PembelianDetail extends Model
{
    use HasFactory, HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;

    public function pembelian(): BelongsTo
    {
        return $this->belongsTo(Pembelian::class, 'Nota', 'Nota');
    }

    public function obat(): BelongsTo
    {
        return $this->belongsTo(Obat::class, 'KdObat', 'KdObat');
    }
}
