<?php

namespace App\Filament\Resources\Tahuns\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TahunForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tahun')
                    ->numeric()
                    ->required(),
                TextInput::make('keterangan'),
                Toggle::make('aktif')
                    ->required(),
            ]);
    }
}
