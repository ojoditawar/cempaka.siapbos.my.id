<?php

namespace App\Filament\Resources\Bahans\Pages;

use App\Filament\Resources\Bahans\BahanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBahans extends ListRecords
{
    protected static string $resource = BahanResource::class;
    protected static ?string $title = 'Daftar Bahan';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
