<?php

namespace App\Filament\Resources\Propinsis\Pages;

use App\Filament\Resources\Propinsis\PropinsiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPropinsis extends ListRecords
{
    protected static string $resource = PropinsiResource::class;
    protected static ?string $title = 'Daftar Propinsi';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
