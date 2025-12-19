<?php

namespace App\Filament\Resources\Propinsis\RelationManagers;

use App\Filament\Resources\Kecamatans\KecamatanResource;
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
use Illuminate\Support\HtmlString;

class KabupatenRelationManager extends RelationManager
{
    protected static string $relationship = 'kavupaten';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode')
                    ->required(),
                TextInput::make('kab')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('kode')
            ->recordAction(null)
            ->recordUrl(null)
            ->heading('Daftar Kabupaten Per Propinsi')
            ->columns([
                TextColumn::make('kode')->label('Propinsi')
                    ->searchable(),
                TextColumn::make('kab')->label('Kabupaten')
                    ->searchable(),
                // ->html()
                // ->formatStateUsing(fn(string $state, $record): HtmlString => new HtmlString(
                //     '<a x-on:click.stop href="' . e(KecamatanResource::getUrl('index') . '?kab=' . $record->kab) . '" class="text-primary-600 hover:underline">' . e($state) . '</a>'
                // )),
                TextColumn::make('nama')->label('Nama Kabupaten')
                    ->html()
                    ->formatStateUsing(fn(string $state, $record): HtmlString => new HtmlString(
                        '<a x-on:click.stop href="' . e(KecamatanResource::getUrl('index') . '?kab=' . $record->kab) . '" class="text-primary-600 hover:underline">' . e($state) . '</a>'
                    )),
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
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
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
