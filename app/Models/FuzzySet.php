<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuzzySet extends Model
{
    protected $table = 'fuzzy_sets';
    protected $fillable = [
        'parameter',
        'label',
        'min',
        'max',
    ];
}
