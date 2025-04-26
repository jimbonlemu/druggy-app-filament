<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenjualanResource\Pages;
use App\Models\Obat;
use App\Models\Penjualan;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PenjualanResource extends Resource
{
    protected static ?string $model = Penjualan::class;

    protected static ?string $navigationLabel = 'Transaksi Penjualan';
    protected static ?string $navigationIcon = 'heroicon-o-arrow-up';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('TglNota')
                    ->label('Tanggal')
                    ->default(now())
                    ->required(),
                Forms\Components\Select::make('KdPelanggan')
                    ->label('Pelanggan')
                    ->relationship('pelanggan', 'NmPelanggan')
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('Diskon')
                    ->required()
                    ->numeric()
                    ->default(0),
                Repeater::make('penjualanDetail')
                    ->label('Detail Penjualan')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('KdObat')
                            ->label('Obat')
                            ->relationship('obat', 'NmObat')
                            ->options(function () {
                                return Obat::where('stok', '>', 0)
                                    ->get()
                                    ->mapWithKeys(function ($obat) {
                                        return [
                                            $obat->KdObat => "{$obat->NmObat} ({$obat->Stok} stok)",
                                        ];
                                    });
                            })
                            ->required()
                            ->searchable(),
                        Forms\Components\TextInput::make('Jumlah')
                            ->label('Jumlah')
                            ->numeric()
                            ->required(),
                    ])
                    ->columnSpan('full'),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Nota')
                    ->label('Id Nota')
                    ->searchable(),
                Tables\Columns\TextColumn::make('TglNota')
                    ->label('Tanggal Pembelian')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pelanggan.NmPelanggan')
                    ->label('Nama Pelanggan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_item')
                    ->label('Total Item')
                    ->getStateUsing(function ($record) {
                        return $record->penjualanDetail->sum('Jumlah');
                    }),
                Tables\Columns\TextColumn::make('total_jenis')
                    ->label('Total Jenis Item')
                    ->getStateUsing(function ($record) {
                        return $record->penjualanDetail->count();
                    }),
                Tables\Columns\TextColumn::make('Diskon')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('cetak')
                    ->label('Cetak Nota')
                    ->icon('heroicon-o-printer')
                    ->url(fn(Penjualan $record) => route('penjualan.cetak', $record))
                    ->openUrlInNewTab(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenjualans::route('/'),
            'create' => Pages\CreatePenjualan::route('/create'),
            'view' => Pages\ViewPenjualan::route('/{record}'),
            // 'edit' => Pages\EditPenjualan::route('/{record}/edit'),
        ];
    }
}
