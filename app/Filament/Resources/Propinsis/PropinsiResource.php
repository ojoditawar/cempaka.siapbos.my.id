<?php

namespace App\Filament\Resources\Propinsis;

use App\Filament\Resources\Propinsis\Pages\CreatePropinsi;
use App\Filament\Resources\Propinsis\Pages\EditPropinsi;
use App\Filament\Resources\Propinsis\Pages\ListPropinsis;
use App\Filament\Resources\Propinsis\RelationManagers\KabupatenRelationManager;
use App\Filament\Resources\Propinsis\Schemas\PropinsiForm;
use App\Filament\Resources\Propinsis\Tables\PropinsisTable;
use App\Models\Provinsi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PropinsiResource extends Resource
{
    protected static ?string $model = Provinsi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingCart;
    protected static ?string $navigationLabel = 'Data Propinsi';

    protected static string|\UnitEnum|null $navigationGroup = 'Referensi';


    protected static ?string $recordTitleAttribute = 'kode';

    public static function form(Schema $schema): Schema
    {
        return PropinsiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PropinsisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            KabupatenRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPropinsis::route('/'),
            'create' => CreatePropinsi::route('/create'),
            'edit' => EditPropinsi::route('/{record}/edit'),
        ];
    }
}
