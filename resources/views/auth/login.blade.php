<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول | رشاقة</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Cairo', sans-serif; } </style>
    <link rel="icon" type="image/png" href="{{asset('healthy-food.png')}}">
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">

    <div class="bg-white p-8 rounded-3xl shadow-xl w-full max-w-md border border-gray-100">
        <div class="text-center mb-8">
            <div class="bg-green-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-800">عوداً حميداً 🍏</h2>
            <p class="text-gray-500 mt-2">سجل دخولك لمتابعة أهدافك الصحية</p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">البريد الإلكتروني</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none transition"
                    placeholder="example@mail.com">
            </div>

            <div>
                <div class="flex justify-between mb-1">
                    <label class="text-sm font-medium text-gray-700">كلمة المرور</label>
                    <a href="#" class="text-xs text-green-600 hover:underline hover:text-green-700">نسيت كلمة المرور؟</a>
                </div>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none transition"
                    placeholder="••••••••">
            </div>

            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-xl shadow-lg shadow-green-100 transition duration-300 transform active:scale-95">
                تسجيل الدخول
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-8">
            ليس لديك حساب؟ <a href="{{ route('register.form') }}" class="text-green-600 font-bold hover:underline hover:text-green-700">أنشئ حساباً جديداً</a>
        </p>
    </div>

</body>
</html>
