<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable = ['nama', 'status'];

    public function jenis()
    {
        return $this->hasMany(Jenis::class, 'kategori_id', 'id');
    }
}
