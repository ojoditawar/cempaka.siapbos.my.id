<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class wilayah extends Model
{
    protected $table = 'wilayah';
    protected $primaryKey = 'kode';
    protected $fillable = ['kode', 'nama'];
}
