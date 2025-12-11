<?php

namespace App\Filament\Resources\Kabupatens\RelationManagers;

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

class KecamatanRelationManager extends RelationManager
{
    protected static string $relationship = 'kecamatan';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kec')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('kec')
            ->columns([
                TextColumn::make('kavupaten.provinsi.nama')->label('Propinsi'),
                TextColumn::make('kavupaten.nama')->label('Kabupaten/Kota')
                    ->searchable(),
                TextColumn::make('kec')->label('Kecamatan')
                    ->searchable(),
                TextColumn::make('nama')->label('Nama Kecamatan')
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
