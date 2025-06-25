<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuzzyRule extends Model
{
    protected $table = 'fuzzy_rules';

    protected $fillable = [
        'harga_label',
        'fasilitas_label',
        'jarak_label',
        'output',
    ];
}
