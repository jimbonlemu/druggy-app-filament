<?php

namespace App\Filament\Resources\PembelianResource\Pages;

use App\Filament\Resources\PembelianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;

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

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Select::make('KdSuplier')
                ->label('Suplier')
                // ->relationship('suplier', 'NmSuplier')
                ->disabled(),
            Forms\Components\DatePicker::make('TglNota')
                ->label('Tanggal')
                ->disabled(),
            Forms\Components\TextInput::make('Diskon')
                ->disabled(),
            Forms\Components\Repeater::make('pembelianDetail')
                ->disabled(),
        ];
    }
}
