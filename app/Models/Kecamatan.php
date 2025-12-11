<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatans';
    protected $primaryKey = 'kec';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'kec',
        'kab',
        'nama',
    ];

    public function kavupaten()
    {
        return $this->belongsTo(Kavupaten::class, 'kab', 'kab');
    }
    public function desa()
    {
        return $this->hasMany(Desa::class, 'kec', 'kec');
    }
}
