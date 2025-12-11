<?php

namespace App\Filament\Resources\Kabupatens\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KabupatenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kab')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
            ]);
    }
}
