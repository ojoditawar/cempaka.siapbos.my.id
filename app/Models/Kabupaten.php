<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupatens';
    protected $primaryKey = 'kode';

    protected $fillable = [
        'kode',
        'nama',
    ];

    public function propinsi()
    {
        return $this->belongsTo(Propinsi::class, 'kode', 'kode');
    }
}
