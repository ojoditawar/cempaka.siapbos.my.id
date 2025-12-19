<?php

namespace App\Filament\Resources\Bahans\Pages;

use App\Filament\Resources\Bahans\BahanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBahan extends CreateRecord
{
    protected static string $resource = BahanResource::class;
    protected static ?string $title = 'Tambah Bahan';
}
