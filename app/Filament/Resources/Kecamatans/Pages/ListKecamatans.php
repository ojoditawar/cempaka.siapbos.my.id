<?php

namespace App\Filament\Resources\Kecamatans\Pages;

use App\Filament\Resources\Kecamatans\KecamatanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListKecamatans extends ListRecords
{
    protected static string $resource = KecamatanResource::class;
    protected static ?string $title = 'Daftar Kecamatan Per Kabupaten';

    protected function getTableQuery(): Builder
    {
        $query = parent::getTableQuery();

        $kab = request()->query('kab');

        if (filled($kab)) {
            $query->where('kab', $kab);
        }

        return $query;
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
