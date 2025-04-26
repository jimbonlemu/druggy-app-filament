<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Suplier extends Model
{
    use HasFactory, HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'KdSuplier';

    public function obat(): HasMany
    {
        return $this->hasMany(Obat::class, 'KdSuplier', 'KdSuplier');
    }
    public function pembelian(): HasMany
    {
        return $this->hasMany(Pembelian::class, 'KdSuplier', 'KdSuplier');
    }
}
