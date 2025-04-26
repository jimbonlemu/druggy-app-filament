<?php


namespace App\Filament\Resources\PembelianResource\Pages;

use Illuminate\Support\Str;
use App\Filament\Resources\PembelianResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePembelian extends CreateRecord
{
    protected static string $resource = PembelianResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['Nota'] = (string) Str::uuid(); // Buat UUID manual kalau mau
        return $data;
    }

    protected function afterCreate(): void
    {
        foreach ($this->record->pembelianDetail as $detail) {
            $obat = $detail->obat;
            $obat->increment('Stok', $detail->Jumlah); // Naikkan stok obat
        }
    }
}
