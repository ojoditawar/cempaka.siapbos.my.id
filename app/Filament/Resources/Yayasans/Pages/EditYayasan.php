<?php

namespace App\Filament\Resources\Yayasans\Pages;

use App\Filament\Resources\Yayasans\YayasanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditYayasan extends EditRecord
{
    protected static string $resource = YayasanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Populate provinsi, kabupaten, kecamatan from desa relationship
        if (isset($data['desa_id']) && $data['desa_id']) {
            $desa = \App\Models\Desa::with(['kecamatan.kavupaten.provinsi'])->find($data['desa_id']);
            if ($desa) {
                $data['propinsi'] = $desa->kecamatan?->kavupaten?->provinsi?->nama ?? '';
                $data['kabupaten'] = $desa->kecamatan?->kavupaten?->nama ?? '';
                $data['kecamatan'] = $desa->kecamatan?->nama ?? '';
            }
        }

        return $data;
    }
}
