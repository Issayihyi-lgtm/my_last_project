<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * تسجيل مستخدم جديد وتوجيهه لصفحة إدخال البيانات
     */
    public function register(RegisterRequest $request)
    {
        // إنشاء المستخدم
        $user = User::create($request->validated());

        // تسجيل الدخول تلقائياً بعد التسجيل
        Auth::login($user);

        // التوجيه لصفحة إدخال البيانات (لأنه مستخدم جديد حتماً)
        return redirect()->route('profile.user_data.create')->with('success', 'تم إنشاء حسابك بنجاح! فضلاً أدمل بياناتك لحساب سعراتك.');
    }

    /**
     * تسجيل الدخول مع فحص وجود بيانات مسبقة
     */
    public function login(LoginRequest $request)
    {
        // محاولة تسجيل الدخول
        if (!Auth::attempt($request->validated())) {
            return back()->withErrors(['email' => 'البيانات المدخلة غير صحيحة'])->withInput();
        }

        $user = Auth::user();

        // منطق التوجيه الذكي
        if ($user->data) {
            // إذا كان قد أدخل بياناته وطوله ووزنه مسبقاً
            return redirect()->route('dashboard');
        } else {
            // إذا لم يسبق له إدخال بياناته
            return redirect()->route('profile.user_data.create');
        }
    }

    /**
     * تسجيل الخروج
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }

    public function wel()
    {
        return view("welcome");
    }
}
