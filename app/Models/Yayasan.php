<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yayasan extends Model
{
    protected $table = 'yayasans';
    protected $fillable = ['desa_id', 'nama', 'alamat', 'no_telp', 'email', 'logo', 'npwp', 'bank', 'no_rekening', 'atas_nama'];

    // Eager load relasi untuk accessor
    protected $with = ['desa.kecamatan.kavupaten.provinsi'];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id', 'id');
    }

    // Accessor untuk mendapatkan nama provinsi dari desa
    public function getPropinsiAttribute()
    {
        return $this->desa?->kecamatan?->kavupaten?->provinsi?->nama ?? '';
    }

    // Accessor untuk mendapatkan nama kabupaten dari desa
    public function getKabupatenAttribute()
    {
        return $this->desa?->kecamatan?->kavupaten?->nama ?? '';
    }

    // Accessor untuk mendapatkan nama kecamatan dari desa
    public function getKecamatanAttribute()
    {
        return $this->desa?->kecamatan?->nama ?? '';
    }
}
