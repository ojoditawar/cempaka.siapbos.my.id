<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kavupaten extends Model
{
    protected $table = 'kavupatens';
    protected $primaryKey = 'kab';
    protected $keyType = 'string';
    public $incrementing = false;


    protected $fillable = [
        'kode',
        'kab',
        'nama',
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'kode', 'kode');
    }
    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'kab', 'kab');
    }
}
