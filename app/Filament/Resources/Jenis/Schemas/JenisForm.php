<?php

namespace App\Filament\Resources\Jenis\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class JenisForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori_id')
                    ->relationship('kategori', 'nama')
                    ->columnSpan('full')
                    ->default(fn() => session('last_kategori_id'))
                    ->afterStateUpdated(fn($state) => session(['last_kategori_id' => $state]))
                    ->live()

                    ->required(),
                TextInput::make('nama')
                    ->required(),
            ]);
    }
}
