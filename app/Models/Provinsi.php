<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsis';
    protected $primaryKey = 'kode';

    protected $fillable = [
        'kode',
        'nama',
    ];

    public function kavupaten()
    {
        return $this->hasMany(Kavupaten::class, 'kode', 'kode');
    }
}
