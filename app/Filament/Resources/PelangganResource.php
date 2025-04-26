<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PelangganResource\Pages;
use App\Filament\Resources\PelangganResource\RelationManagers;
use App\Models\Pelanggan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PelangganResource extends Resource
{
    protected static ?string $model = Pelanggan::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Manajemen Pelanggan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('NmPelanggan')
                    ->label('Nama Pelanggan')
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
                Tables\Columns\TextColumn::make('KdPelanggan')
                    ->label('Kode Pelanggan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('NmPelanggan')
                    ->label('Nama Pelanggan')
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
            'index' => Pages\ListPelanggans::route('/'),
            'create' => Pages\CreatePelanggan::route('/create'),
            'edit' => Pages\EditPelanggan::route('/{record}/edit'),
        ];
    }
}
