<?php

namespace App\Filament\Resources\PenjualanResource\Pages;

use App\Filament\Resources\PenjualanResource;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;

class CreatePenjualan extends CreateRecord
{
    protected static string $resource = PenjualanResource::class;

     protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['Nota'] = (string) Str::uuid();
        return $data;
    }

    protected function afterCreate(): void
    {
        foreach ($this->record->penjualanDetail as $detail) {
            $obat = $detail->obat;
            $obat->decrement('Stok', $detail->Jumlah);
        }
    }
}
