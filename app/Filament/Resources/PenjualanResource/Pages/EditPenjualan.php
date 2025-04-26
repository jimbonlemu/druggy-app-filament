<?php

namespace App\Filament\Resources\PenjualanResource\Pages;

use App\Filament\Resources\PenjualanResource;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\Repeater;

class EditPenjualan extends EditRecord
{
    protected static string $resource = PenjualanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\DatePicker::make('TglNota')
                ->label('Tanggal')
                ->disabled(),

            Forms\Components\Select::make('KdPelanggan')
                ->label('Pelanggan')
                ->disabled(),

            Forms\Components\TextInput::make('Diskon')
                ->disabled(),

            Repeater::make('penjualanDetail')
                ->disabled(),
        ];
    }
}
