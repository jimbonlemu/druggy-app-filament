<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuplierResource\Pages;
use App\Models\Suplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SuplierResource extends Resource
{
    protected static ?string $model = Suplier::class;

    protected static ?string $navigationLabel = 'Manajemen Suplier';
    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('NmSuplier')
                    ->label('Nama Suplier')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Kota')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Telpon')
                    ->label('Nomor Telepon')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('KdSuplier')
                    ->label('Kode Suplier')
                    ->searchable(),
                Tables\Columns\TextColumn::make('NmSuplier')
                    ->label('Nama Suplier')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Kota')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Telpon')
                    ->label('Nomor Telfon')
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
            'index' => Pages\ListSupliers::route('/'),
            'create' => Pages\CreateSuplier::route('/create'),
            'edit' => Pages\EditSuplier::route('/{record}/edit'),
        ];
    }
}
