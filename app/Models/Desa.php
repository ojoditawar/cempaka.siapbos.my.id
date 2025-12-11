<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desas';
    protected $primaryKey = 'id';

    //  protected $primaryKey = 'desa';
    // protected $keyType = 'string';
    // public $incrementing = false;


    protected $fillable = [
        'desa',
        'kec',
        'nama',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kec', 'kec');
    }

    // Accessor untuk menampilkan nama lengkap dengan hierarki
    public function getNamaLengkapAttribute()
    {
        $this->loadMissing(['kecamatan.kavupaten.provinsi']);

        $provinsi = $this->kecamatan?->kavupaten?->provinsi?->nama ?? '';
        $kabupaten = $this->kecamatan?->kavupaten?->nama ?? '';
        $kecamatan = $this->kecamatan?->nama ?? '';
        $desa = $this->nama ?? '';

        // Filter empty values and join with separator
        $parts = array_filter([$provinsi, $kabupaten, $kecamatan, $desa]);
        return implode(' - ', $parts);
    }
}
