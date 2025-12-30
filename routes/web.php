<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\FoodSuggestionController;


// صفحة الترحيب
Route::get('/', [AuthController::class, 'wel'])->name('welcome');

// المصادقة
Route::get('/register', function () { return view('auth.register'); })->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', function () { return view('auth.login'); })->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Protected Routes (يجب تسجيل الدخول)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // 1. لوحة التحكم - Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // 2. إدخال البيانات الشخصية - الملف مطابق لـ user_data.blade.php
    Route::get('/profile/user-data', [UserDataController::class, 'create'])->name('profile.user_data.create');
    Route::post('/profile/user-data', [UserDataController::class, 'store'])->name('profile.user_data.store');

    // 3. عرض النتائج - الملف مطابق لـ calories.show (الموجود داخل مجلد calories)
    Route::get('/results', [UserDataController::class, 'show'])->name('calories.show');

    // 4. مصادر التغذية - الملف مطابق لـ food_suggestions.blade.php
    Route::get('/food-suggestions', [FoodSuggestionController::class, 'index'])->name('food.index');

});
