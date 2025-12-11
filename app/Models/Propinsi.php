<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propinsi extends Model
{
    protected $table = 'propinsis';
    protected $primaryKey = 'kode';

    protected $fillable = [
        'kode',
        'nama',
    ];

    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class, 'kode', 'kode');
    }
}
