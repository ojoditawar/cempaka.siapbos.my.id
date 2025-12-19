<?php

namespace App\Filament\Resources\Bahans\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BahanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255)->columnSpanFull(),
                TextInput::make('satuan')
                    ->required()
                    ->maxLength(255)->columnSpanFull(),
                FileUpload::make('image_path')
                    ->label('Gambar Bahan')
                    ->image()
                    ->imageEditor()
                    ->imagePreviewHeight('250')
                    ->multiple(false)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
                    ->maxSize(5120) // 5MB
                    ->nullable()
                    ->disk('public')
                    ->directory('bahans')
                    ->preserveFilenames()
                    ->storeFileNamesIn('image_filename'),
            ]);
    }
}
