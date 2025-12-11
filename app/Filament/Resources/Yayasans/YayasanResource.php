<?php

namespace App\Filament\Resources\Yayasans;

use App\Filament\Resources\Yayasans\Pages\CreateYayasan;
use App\Filament\Resources\Yayasans\Pages\EditYayasan;
use App\Filament\Resources\Yayasans\Pages\ListYayasans;
use App\Filament\Resources\Yayasans\Schemas\YayasanForm;
use App\Filament\Resources\Yayasans\Tables\YayasansTable;
use App\Models\Yayasan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class YayasanResource extends Resource
{
    protected static ?string $model = Yayasan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $navigationLabel = 'Data Yayasan';
    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return YayasanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return YayasansTable::configure($table);
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
            'index' => ListYayasans::route('/'),
            'create' => CreateYayasan::route('/create'),
            'edit' => EditYayasan::route('/{record}/edit'),
        ];
    }

    public static function getTableHeading(): string
    {
        return 'Daftar Semua Yayasan Baru'; // ← ini yang muncul di atas tabel
    }
}
