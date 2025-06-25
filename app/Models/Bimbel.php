<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bimbel extends Model
{
    protected $table = 'bimbels';

    protected $fillable = [
        'nama',
        'alamat',
        'biaya',
        'jarak',
        'fasilitas',
    ];
}
