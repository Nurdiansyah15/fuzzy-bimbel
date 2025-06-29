<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preferensi extends Model
{
    //
    protected $fillable = [
        'user_id',
        'harga_min',
        'harga_max',
        'jarak_max',
        'fasilitas'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
