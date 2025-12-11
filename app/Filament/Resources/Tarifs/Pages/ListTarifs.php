<?php

namespace App\Filament\Resources\Tarifs\Pages;

use App\Filament\Resources\Tarifs\TarifResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTarifs extends ListRecords
{
    protected static string $resource = TarifResource::class;
    protected static ?string $title = 'Tarif Dasar Kebutuhan MBG';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
