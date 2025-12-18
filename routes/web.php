<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return DB::table('user_bc')->get();
});

// Route::get('/test-token', function () {
//     $user = App\Models\User::first();
//     $token = $user->createToken('api-token')->plainTextToken;
//     dd($token);
// });
