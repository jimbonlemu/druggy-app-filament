<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ObatResource\Pages;
use App\Models\Obat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ObatResource extends Resource
{
    protected static ?string $model = Obat::class;
    protected static ?string $navigationLabel = 'Manajemen Obat';
    protected static ?string $navigationIcon = 'heroicon-m-presentation-chart-line';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('NmObat')
                    ->label('Nama Obat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Jenis')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Satuan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('HargaBeli')
                    ->currencyMask()
                    ->prefix('Rp')
                    ->required()
                    ->numeric()
                    ->inputMode('numeric'),
                Forms\Components\TextInput::make('HargaJual')
                    ->currencyMask()
                    ->required()
                    ->prefix('Rp')
                    ->numeric()
                    ->inputMode('numeric'),
                Forms\Components\TextInput::make('Stok')
                    ->required()
                    ->numeric()
                    ->inputMode('numeric'),
                Forms\Components\Select::make('KdSuplier')
                    ->relationship('suplier', 'NmSuplier')
                    ->searchable()
                    ->preload()
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('KdObat')
                    ->label('Kode Obat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('NmObat')
                    ->label('Nama Obat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Jenis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Satuan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('HargaBeli')
                    ->label('Harga Beli')
                    ->numeric()
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('HargaJual')
                    ->label('Harga Jual')
                    ->numeric()
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('Stok')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('suplier.NmSuplier')
                    ->label('Nama Suplier')
                    ->searchable(),
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
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListObats::route('/'),
            'create' => Pages\CreateObat::route('/create'),
            'edit' => Pages\EditObat::route('/{record}/edit'),
        ];
    }
}
