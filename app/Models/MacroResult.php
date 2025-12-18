<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MacroResult extends Model
{
    protected $fillable = [
        'user_id',
        'calories',
        'protein',
        'carbs',
        'fat',
        'bmr',
        'tdee',
        'goal',
        'result_date'
    ];
    public function user(){
        return
        $this->belongsTo(User::class);
    }
}
