<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الخطة الغذائية | رشاقة</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700;900&display=swap" rel="stylesheet">
    <style> body { font-family: 'Cairo', sans-serif; } </style>
    <link rel="icon" type="image/png" href="{{asset('healthy-food.png')}}">
</head>
<body class="bg-emerald-50 min-h-screen pb-12">

    <nav class="bg-white p-4 shadow-sm mb-8 border-b border-emerald-100">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-emerald-600 font-bold flex items-center hover:bg-emerald-50 px-3 py-2 rounded-lg transition">
                <span class="ml-2">🏠</span> العودة للرئيسية
            </a>
            <span class="font-black text-xl text-emerald-800 italic">حساب السعرات</span>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4">

        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-emerald-200/50 overflow-hidden mb-8 border border-emerald-50">
            <div class="bg-gradient-to-br from-emerald-500 to-emerald-700 p-12 text-center text-white relative">
                <div class="absolute top-4 right-6 opacity-10 text-6xl italic font-black text-white">HEALTH</div>
                <p class="text-emerald-50 text-lg mb-2 relative z-10 font-bold">احتياجك اليومي الموصى به</p>

                {{-- عرض السعرات مع فحص المسميين المحتملين --}}
                <h1 class="text-7xl font-black mb-2 relative z-10">
                    {{ $macroResults->calories ?? $macroResults->daily_calories ?? '0' }}
                </h1>

                <p class="text-xl font-bold italic opacity-90 uppercase tracking-widest">Calories / Day</p>
            </div>

            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {{-- البروتين --}}
                    <div class="bg-white border-2 border-emerald-100 rounded-3xl p-6 text-center shadow-sm">
                        <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🥩</span>
                        </div>
                        <h3 class="text-emerald-700 font-bold mb-1">البروتين</h3>
                        <p class="text-3xl font-black text-slate-800">
                            {{ $macroResults->protein ?? $macroResults->protein_g ?? '0' }}
                            <small class="text-sm font-normal text-slate-400">جم</small>
                        </p>
                    </div>

                    {{-- الكربوهيدرات --}}
                    <div class="bg-white border-2 border-emerald-100 rounded-3xl p-6 text-center shadow-sm">
                        <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🍚</span>
                        </div>
                        <h3 class="text-emerald-700 font-bold mb-1">الكربوهيدرات</h3>
                        <p class="text-3xl font-black text-slate-800">
                            {{ $macroResults->carbs ?? $macroResults->carbs_g ?? '0' }}
                            <small class="text-sm font-normal text-slate-400">جم</small>
                        </p>
                    </div>

                    {{-- الدهون --}}
                    <div class="bg-white border-2 border-emerald-100 rounded-3xl p-6 text-center shadow-sm">
                        <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🥑</span>
                        </div>
                        <h3 class="text-emerald-700 font-bold mb-1">الدهون</h3>
                        <p class="text-3xl font-black text-slate-800">
                            {{ $macroResults->fat ?? $macroResults->fat_g ?? '0' }}
                            <small class="text-sm font-normal text-slate-400">جم</small>
                        </p>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="{{ route('food.index') }}" class="flex items-center justify-center w-full bg-orange-500 hover:bg-orange-600 text-white font-black py-5 rounded-2xl shadow-lg shadow-orange-200 transition-all text-lg transform hover:scale-[1.02]">
                        استكشف مصادر التغذية المناسبة لك 🥗
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
