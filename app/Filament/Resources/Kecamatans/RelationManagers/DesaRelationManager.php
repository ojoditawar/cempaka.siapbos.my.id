<?php

namespace App\Filament\Resources\Kecamatans\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DesaRelationManager extends RelationManager
{
    protected static string $relationship = 'desa';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('desa')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('desa')
            ->columns([
                TextColumn::make('kecamatan.kavupaten.provinsi.nama')->label('Propinsi')
                    ->searchable(),
                TextColumn::make('kecamatan.kavupaten.nama')->label('Kabupaten')
                    ->searchable(),
                TextColumn::make('kecamatan.nama')->label('Kecamatan')
                    ->searchable(),
                TextColumn::make('desa')->label('Desa')
                    ->searchable(),
                TextColumn::make('nama')->label('Nama Desa')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
