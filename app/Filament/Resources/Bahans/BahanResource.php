<?php

namespace App\Filament\Resources\Bahans;

use App\Filament\Resources\Bahans\Pages\CreateBahan;
use App\Filament\Resources\Bahans\Pages\EditBahan;
use App\Filament\Resources\Bahans\Pages\ListBahans;
use App\Filament\Resources\Bahans\Schemas\BahanForm;
use App\Filament\Resources\Bahans\Tables\BahansTable;
use App\Models\Bahan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BahanResource extends Resource
{
    protected static ?string $model = Bahan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;
    protected static ?string $navigationParentItem = 'Kategoris';
    protected static ?int $navigationSort = 2;
    protected static ?string $recordTitleAttribute = 'nama';
    protected static ?string $navigationLabel = 'Data Bahan';

    public static function form(Schema $schema): Schema
    {
        return BahanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BahansTable::configure($table);
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
            'index' => ListBahans::route('/'),
            'create' => CreateBahan::route('/create'),
            'edit' => EditBahan::route('/{record}/edit'),
        ];
    }
}
