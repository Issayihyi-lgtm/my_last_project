<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MacroResults extends Model
{
    protected $fillable = [
        'user_id',
        'calories',
        'protein',
        'carbs',
        'fat',
        'result_date',
    ];
}
