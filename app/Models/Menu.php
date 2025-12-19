<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'kategori_id',
        'nama',
        'deskripsi',
        'harga',
        'image',
        'is_available'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
