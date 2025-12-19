<?php

namespace App\Filament\Resources\Jenis;

use App\Filament\Resources\Jenis\Pages\CreateJenis;
use App\Filament\Resources\Jenis\Pages\EditJenis;
use App\Filament\Resources\Jenis\Pages\ListJenis;
use App\Filament\Resources\Jenis\Schemas\JenisForm;
use App\Filament\Resources\Jenis\Tables\JenisTable;
use App\Models\Jenis;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class JenisResource extends Resource
{
    protected static ?string $model = Jenis::class;

    // Icon navigasi utama (misalnya untuk resource atau page utama)
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArrowSmallUp;

    protected static ?string $navigationParentItem = 'Kategoris';
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return JenisForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JenisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJenis::route('/'),
            'create' => CreateJenis::route('/create'),
            'edit' => EditJenis::route('/{record}/edit'),
        ];
    }
}
