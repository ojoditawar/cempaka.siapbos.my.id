<?php

namespace App\Filament\Resources\Tarifs\Schemas;

use App\Models\Jenis;
use App\Models\Tarif;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TarifForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('jenis_id')->columnSpan(2)
                    ->options(Jenis::all()->pluck('nama', 'id'))
                    ->columnSpanFull()
                    ->label('Jenis Tarif')
                    ->preload()
                    ->live()
                    ->default(session('tarif_jenis_id'))
                    ->afterStateUpdated(function ($state, $set) {
                        session(['tarif_jenis_id' => $state]);
                        if ($state) {
                            // Generate next incremental code for this jenis
                            $lastTarif = Tarif::where('jenis_id', $state)
                                ->orderBy('kode', 'desc')
                                ->first();

                            $nextCode = $lastTarif ? (intval($lastTarif->kode) + 1) : 1;
                            $set('kode', str_pad($nextCode, 2, '0', STR_PAD_LEFT));
                        }
                    })
                    ->required(),
                TextInput::make('kode')->columnSpan(1)
                    ->columnSpanFull()
                    ->label('Kode Tarif')
                    ->live()
                    ->default(function ($get) {
                        $jenisId = $get('jenis_id') ?? session('tarif_jenis_id');
                        if ($jenisId) {
                            $lastTarif = Tarif::where('jenis_id', $jenisId)
                                ->orderBy('kode', 'desc')
                                ->first();
                            $nextCode = $lastTarif ? (intval($lastTarif->kode) + 1) : 1;
                            return str_pad($nextCode, 2, '0', STR_PAD_LEFT);
                        }
                        return '01';
                    })
                    // ->hint('Otomatis berdasarkan jenis yang dipilih')
                    ->required(),
                Textarea::make('nama')->columnSpan(12)
                    ->columnSpanFull()
                    ->label('Nama Kebutuhan')
                    ->required(),
                TextInput::make('harga')->columnSpan(3)
                    ->label('Satuan Harga')
                    ->required()
                    ->default(0)
                    ->currencyMask(thousandSeparator: ',', decimalSeparator: '.', precision: 0)
                    ->numeric(),
                TextInput::make('dk')->columnSpan(3)
                    ->label('Dana Kesehatan')
                    ->default(0)
                    ->currencyMask(thousandSeparator: ',', decimalSeparator: '.', precision: 0)
                    ->numeric()
                    ->hidden(function ($get) {
                        $jenisId = $get('jenis_id');
                        if (!$jenisId) return true;
                        $jenis = Jenis::find($jenisId);
                        return $jenis ? $jenis->nama == 'RAB' : true;
                    }),
                TextInput::make('tk')->columnSpan(3)
                    ->label('Tunjangan Keluarga')
                    ->default(0)
                    ->currencyMask(thousandSeparator: ',', decimalSeparator: '.', precision: 0)
                    ->numeric()
                    ->hidden(function ($get) {
                        $jenisId = $get('jenis_id');
                        if (!$jenisId) return true;
                        $jenis = Jenis::find($jenisId);
                        return $jenis ? $jenis->nama == 'RAB' : true;
                    }),
                TextInput::make('pj')->columnSpan(3)
                    ->label('Pajak')
                    ->default(0)
                    ->currencyMask(thousandSeparator: ',', decimalSeparator: '.', precision: 0)
                    ->numeric()
                    ->hidden(function ($get) {
                        $jenisId = $get('jenis_id');
                        if (!$jenisId) return true;
                        $jenis = Jenis::find($jenisId);
                        return $jenis ? $jenis->nama == 'RAB' : true;
                    }),
                // 
                MarkdownEditor::make('deskripsi')
                    ->columnSpanFull(),
            ])
            ->columns(12);
    }
}
