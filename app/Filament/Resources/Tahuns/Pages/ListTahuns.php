<?php

namespace App\Filament\Resources\Tahuns\Pages;

use App\Filament\Resources\Tahuns\TahunResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTahuns extends ListRecords
{
    protected static string $resource = TahunResource::class;
    protected static ?string $title = 'Tahun Anggaran';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
