<?php

namespace App\Filament\Resources\Propinsis\Pages;

use App\Filament\Resources\Propinsis\PropinsiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPropinsi extends EditRecord
{
    protected static string $resource = PropinsiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
