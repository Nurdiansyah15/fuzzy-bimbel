<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    //
    protected $table = 'testimonis';

    protected $fillable = [
        'user_id',
        'bimbel_id',
        'komentar',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bimbel()
    {
        return $this->belongsTo(Bimbel::class);
    }
}
