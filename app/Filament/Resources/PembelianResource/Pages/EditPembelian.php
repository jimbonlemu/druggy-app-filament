<?php

namespace App\Filament\Resources\PembelianResource\Pages;

use App\Filament\Resources\PembelianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPembelian extends EditRecord
{
    protected static string $resource = PembelianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterDelete(): void
    {
        foreach ($this->record->pembelianDetail as $detail) {
            $obat = $detail->obat;
            $obat->decrement('Stok', $detail->Jumlah);
        }
    }
}
