<?php

namespace App\Filament\Resources\Kabupatens;

use App\Filament\Resources\Kabupatens\Pages\CreateKabupaten;
use App\Filament\Resources\Kabupatens\Pages\EditKabupaten;
use App\Filament\Resources\Kabupatens\Pages\ListKabupatens;
use App\Filament\Resources\Kabupatens\RelationManagers\KecamatanRelationManager;
use App\Filament\Resources\Kabupatens\Schemas\KabupatenForm;
use App\Filament\Resources\Kabupatens\Tables\KabupatensTable;
use App\Models\Kavupaten;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KabupatenResource extends Resource
{
    protected static ?string $model = Kavupaten::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $navigationLabel = 'Data Kabupaten';

    protected static string|\UnitEnum|null $navigationGroup = 'Referensi';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'kode';

    public static function form(Schema $schema): Schema
    {
        return KabupatenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KabupatensTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            KecamatanRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKabupatens::route('/'),
            'create' => CreateKabupaten::route('/create'),
            'edit' => EditKabupaten::route('/{record}/edit'),
        ];
    }
}
