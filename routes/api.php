<?php
use App\Http\Controllers\MacroResultController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('welcome',[WelcomeController::class,'welcome']);
// Route::get('user/{id}',[Usercontroller::class,'CheckUser']);
// تسجيل مستخدم جديد
Route::post('/register', [AuthController::class, 'register']);

// تسجيل الدخول
Route::post('/login', [AuthController::class, 'login']);

// // مثال: جلب بيانات المستخدم المسجل (محمي بـ Sanctum)
// Route::middleware('auth:sanctum')->get('/user', function () {
//     return auth()->user();
// });
// Route::post('/user_data',[UserDataController::class,'store']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user_data', [UserDataController::class, 'show']);
    Route::post('/user_data', [UserDataController::class, 'store']);
    Route::put('/user_data', [UserDataController::class, 'update']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/calculate_calories', [MacroResultController::class, 'calculate']);
});
