<?php

namespace App\Filament\Resources\Yayasans\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class YayasanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columns(4)
                    ->columnSpanFull()
                    ->schema([
                        Section::make()
                            ->columns(3)
                            ->columnSpanFull()
                            ->description('Nama Propinsi, Kabupaten, dan Kecamatan akan 
                            Otomatis terisi berdasarkan desa yang dipilih')
                            ->schema([
                                Placeholder::make('propinsi')
                                    ->label('Propinsi')
                                    ->disabled()
                                    ->dehydrated(false),
                                // ->hint('Otomatis terisi berdasarkan desa yang dipilih'),
                                Placeholder::make('kabupaten')
                                    ->label('Kabupaten')
                                    ->disabled()
                                    ->dehydrated(false),
                                // ->hint('Otomatis terisi berdasarkan desa yang dipilih'),
                                Placeholder::make('kecamatan')
                                    ->label('Kecamatan')
                                    ->disabled()
                                    ->dehydrated(false),
                                // ->hint('Otomatis terisi berdasarkan desa yang dipilih'),
                            ]),
                        Select::make('desa_id')
                            ->getSearchResultsUsing(function (string $search) {
                                return \App\Models\Desa::with(['kecamatan.kavupaten.provinsi'])
                                    ->where(function ($query) use ($search) {
                                        $query->where('nama', 'like', "%{$search}%")
                                            ->orWhereHas('kecamatan', function ($q) use ($search) {
                                                $q->where('nama', 'like', "%{$search}%");
                                            })
                                            ->orWhereHas('kecamatan.kavupaten', function ($q) use ($search) {
                                                $q->where('nama', 'like', "%{$search}%");
                                            })
                                            ->orWhereHas('kecamatan.kavupaten.provinsi', function ($q) use ($search) {
                                                $q->where('nama', 'like', "%{$search}%");
                                            });
                                    })
                                    ->limit(50)
                                    ->get()
                                    ->mapWithKeys(function ($desa) {
                                        return [$desa->id => $desa->nama_lengkap];
                                    });
                            })
                            ->getOptionLabelUsing(function ($value) {
                                if (!$value) return '';
                                $desa = \App\Models\Desa::with(['kecamatan.kavupaten.provinsi'])->find($value);
                                return $desa ? $desa->nama_lengkap : "Desa ID: {$value}";
                            })
                            ->getOptionLabelsUsing(function (array $values) {
                                return \App\Models\Desa::with(['kecamatan.kavupaten.provinsi'])
                                    ->whereIn('id', $values)
                                    ->get()
                                    ->mapWithKeys(function ($desa) {
                                        return [$desa->id => $desa->nama_lengkap];
                                    });
                            })
                            ->options(function () {
                                // Load beberapa desa pertama sebagai default options
                                return \App\Models\Desa::with(['kecamatan.kavupaten.provinsi'])
                                    ->limit(10)
                                    ->get()
                                    ->mapWithKeys(function ($desa) {
                                        return [$desa->id => $desa->nama_lengkap];
                                    });
                            })
                            ->searchable()
                            ->label('Nama Lokasi Desa Yayasan')
                            ->required()
                            ->columnSpanFull()
                            ->placeholder('Ketik untuk mencari desa...')
                            ->reactive()
                            ->live()
                            ->afterStateUpdated(function ($state, $set) {
                                if ($state) {
                                    $desa = \App\Models\Desa::with(['kecamatan.kavupaten.provinsi'])->find($state);
                                    if ($desa && $desa->kecamatan) {
                                        $set('kecamatan', $desa->kecamatan->nama ?? '');
                                        $set('kabupaten', $desa->kecamatan->kavupaten->nama ?? '');
                                        $set('propinsi', $desa->kecamatan->kavupaten->provinsi->nama ?? '');
                                    }
                                }
                            }),
                    ]),
                Section::make()
                    ->columns(2)
                    ->schema([
                        TextInput::make('nama')
                            ->columnSpanFull()
                            ->label('Nama Yayasan')
                            ->required(),
                        TextInput::make('alamat')
                            ->columnSpanFull()
                            ->label('Alamat')
                            ->required(),
                        TextInput::make('no_telp')
                            ->label('No Telp')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email')
                            ->email(),
                    ]),
                Section::make()
                    ->columns(2)
                    ->schema([
                        TextInput::make('bank')
                            ->label('Bank')
                            ->required(),
                        TextInput::make('no_rekening')
                            ->label('No Rekening')
                            ->required(),
                        TextInput::make('atas_nama')
                            ->label('Atas Nama')
                            ->required(),
                        TextInput::make('npwp')
                            ->label('NPWP Yayasan')
                            ->required(),
                    ]),
                Section::make()
                    ->columns(2)
                    ->schema([
                        FileUpload::make('logo')
                            ->label('Logo Yayasan'),
                    ]),
            ]);
    }
}
