<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Obat extends Model
{
    use HasFactory, HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'KdObat';

    public function suplier(): BelongsTo
    {
        return $this->belongsTo(Suplier::class, 'KdSuplier', 'KdSuplier');
    }

    public function penjualanDetail(): HasMany
    {
        return $this->hasMany(PenjualanDetail::class, 'KdObat', 'KdObat');
    }

    public function pembelianDetail(): HasMany
    {
        return $this->hasMany(PembelianDetail::class, 'KdObat', 'KdObat');
    }
}
