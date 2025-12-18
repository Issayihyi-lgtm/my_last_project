<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $fillable = [
        'user_id',
        'age',
        'weight',
        'height',
        'activity',
        'gender',
        'goal',
    ];
    public function user(){
        return
        $this->belongsTo(User::class);
    }
}
