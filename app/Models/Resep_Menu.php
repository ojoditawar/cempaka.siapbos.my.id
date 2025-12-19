<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep_Menu extends Model
{
    protected $table = 'resep_menus';

    protected $fillable = [
        'menu_id',
        'bahan_id',
        'jumlah',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function bahan()
    {
        return $this->belongsTo(Bahan::class);
    }
}
