<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembelianResource\Pages;
use App\Models\Obat;
use App\Models\Pembelian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PembelianResource extends Resource
{
    protected static ?string $model = Pembelian::class;

    protected static ?string $navigationLabel = 'Transaksi Pembelian';
    protected static ?string $navigationIcon = 'heroicon-o-arrow-down';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('KdSuplier')
                    ->label('Suplier')
                    ->relationship('suplier', 'NmSuplier')
                    ->required(),
                Forms\Components\DatePicker::make('TglNota')
                    ->label('Tanggal')
                    ->default(now())
                    ->required(),
                Forms\Components\TextInput::make('Diskon')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Repeater::make('pembelianDetail')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('KdObat')
                            ->label('Obat')
                            ->relationship('obat', 'NmObat')
                            ->options(function () {
                                return Obat::all()
                                    ->mapWithKeys(function ($obat) {
                                        return [
                                            $obat->KdObat => "{$obat->NmObat} ({$obat->Stok} stok)",
                                        ];
                                    });
                            })
                            ->required()
                            ->searchable(),
                        Forms\Components\TextInput::make('Jumlah')
                            ->numeric()
                            ->required(),
                    ])
                    ->columnSpan('full')
                    ->defaultItems(1),

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
                Tables\Columns\TextColumn::make('Diskon')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('suplier.NmSuplier')
                    ->label('Suplier')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_item')
                    ->label('Total Item')
                    ->getStateUsing(function ($record) {
                        return $record->pembelianDetail->sum('Jumlah');
                    }),
                Tables\Columns\TextColumn::make('total_jenis')
                    ->label('Total Jenis Item')
                    ->getStateUsing(function ($record) {
                        return $record->pembelianDetail->count();
                    }),
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
                Tables\Actions\Action::make('print_nota')
                    ->label('Cetak Nota')
                    ->icon('heroicon-o-printer')
                    ->url(fn(Pembelian $record) => route('pembelian.print', $record))
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
            'index' => Pages\ListPembelians::route('/'),
            'create' => Pages\CreatePembelian::route('/create'),
            'view' => Pages\ViewPembelian::route('/{record}'),
            // 'edit' => Pages\EditPembelian::route('/{record}/edit'),
        ];
    }
}
