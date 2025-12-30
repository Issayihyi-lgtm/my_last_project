<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الملف الصحي | رشاقة</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Cairo', sans-serif; } </style>
    <link rel="icon" type="image/png" href="{{asset('healthy-food.png')}}">
</head>
<body class="bg-slate-100 min-h-screen py-10 px-4">

    <div class="max-w-3xl mx-auto">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center text-slate-500 hover:text-indigo-600 mb-6 transition font-bold">
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            العودة للرئيسية
        </a>

        @if ($errors->any())
            <div class="bg-red-50 border-r-4 border-red-500 p-4 mb-6 rounded-xl">
                <ul class="list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 overflow-hidden">
            <div class="bg-indigo-600 p-8 text-white text-right">
                <h1 class="text-2xl font-extrabold italic">بناء ملفك الشخصي 🚀</h1>
                <p class="text-indigo-100 text-sm mt-2">أدخل بياناتك بدقة لنقوم بحساب السعرات والماكروز المناسبة لهدفك.</p>
            </div>

            <form action="{{ route('profile.user_data.store') }}" method="POST" class="p-8 space-y-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="font-bold text-slate-700 flex items-center">
                            <span class="ml-2">⚖️</span> الوزن (كجم)
                        </label>
                        <input type="number" name="weight" step="0.1" required placeholder="70"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition">
                    </div>

                    <div class="space-y-2">
                        <label class="font-bold text-slate-700 flex items-center">
                            <span class="ml-2">📏</span> الطول (سم)
                        </label>
                        <input type="number" name="height" required placeholder="175"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition">
                    </div>

                    <div class="space-y-2">
                        <label class="font-bold text-slate-700 flex items-center">
                            <span class="ml-2">🎂</span> العمر
                        </label>
                        <input type="number" name="age" required placeholder="25"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition">
                    </div>
                </div>

                <hr class="border-slate-100">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-right">
                    <div class="space-y-4">
                        <label class="font-bold text-slate-700">الجنس</label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="cursor-pointer">
                                <input type="radio" name="gender" value="male" class="peer hidden" checked>
                                <div class="p-4 text-center rounded-xl border-2 border-slate-100 peer-checked:border-indigo-600 peer-checked:bg-indigo-50 hover:bg-slate-50 transition">
                                    👨 ذكر
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="gender" value="female" class="peer hidden">
                                <div class="p-4 text-center rounded-xl border-2 border-slate-100 peer-checked:border-pink-500 peer-checked:bg-pink-50 hover:bg-slate-50 transition">
                                    👩 أنثى
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <label class="font-bold text-slate-700">الهدف الحالي</label>
                        <select name="goal" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-4 focus:ring-indigo-100 transition">
                            <option value="cut">تنشيف (خسارة وزن)</option>
                            <option value="maintain">محافظة (ثبات وزن)</option>
                            <option value="bulk">تضخيم (زيادة عضل)</option>
                        </select>
                    </div>
                </div>

                <div class="space-y-4 text-right">
                    <label class="font-bold text-slate-700 flex items-center">
                        <span class="ml-2">⚡</span> مستوى النشاط البدني
                    </label>
                    <select name="activity" class="w-full px-4 py-4 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-4 focus:ring-indigo-100 transition">
                        <option value="none">بدون نشاط (خامل تماماً)</option>
                        <option value="light">نشاط خفيف (تمرين بسيط 1-3 أيام)</option>
                        <option value="medium">نشاط متوسط (تمرين منتظم 3-5 أيام)</option>
                        <option value="high">نشاط عالي (تمرين شاقة 6-7 أيام)</option>
                        <option value="very_high">نشاط عالي جداً (رياضي محترف / شغل شاق)</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-extrabold py-5 rounded-2xl shadow-lg shadow-indigo-200 transition-all transform hover:scale-[1.01] active:scale-95 text-lg">
                    حفظ البيانات وحساب النتائج ✨
                </button>
            </form>
        </div>
    </div>

</body>
</html>
