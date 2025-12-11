<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $fillable = [
        'jenis_id',
        'kode',
        'nama',
        'harga',
        'dk',
        'tk',
        'tj',
        'deskripsi',
    ];
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id', 'id');
    }
}
