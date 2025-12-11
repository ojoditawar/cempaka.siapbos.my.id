<?php

namespace App\Filament\Resources\Tarifs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TarifsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jenis.nama')
                    ->label('Jenis Tarif'),
                TextColumn::make('kode')
                    ->searchable(),
                TextColumn::make('nama')
                    ->label('Nama Kebutuhan')
                    ->wrap(),
                TextColumn::make('harga')
                    ->label('Honor')
                    ->numeric(),
                TextColumn::make('dk')
                    ->label('Dana Kesehatan')
                    ->numeric(),
                TextColumn::make('tk')
                    ->label('Tunjangan Keluarga')
                    ->numeric(),
                TextColumn::make('pj')
                    ->label('Pajak')
                    ->numeric(),
                TextColumn::make('deskripsi')
                    ->wrap(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
