<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دليل مصادر التغذية | رشاقة</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700;900&display=swap" rel="stylesheet">
    <style> body { font-family: 'Cairo', sans-serif; } </style>
    <link rel="icon" type="image/png" href="{{asset('healthy-food.png')}}">
</head>
<body class="bg-orange-50 min-h-screen pb-12">

    <nav class="bg-white p-4 shadow-sm mb-8 border-b-2 border-orange-100">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-orange-600 font-bold flex items-center hover:bg-orange-50 px-3 py-2 rounded-xl transition">
                <span class="ml-2">🏠</span> العودة للرئيسية
            </a>
            <h1 class="font-black text-xl text-orange-800 italic">دليل مصادر التغذية 🥗</h1>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-4">

        <div class="text-center mb-10">
            <h2 class="text-3xl font-black text-orange-900 mb-6">أفضل الخيارات لهدفك</h2>

            <form action="{{ url()->current() }}" method="GET" class="max-w-md mx-auto relative">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="ابحث عن صنف (دجاج، أرز، أفوكادو...)"
                    class="w-full px-6 py-4 rounded-2xl border-2 border-orange-200 focus:border-orange-500 outline-none shadow-lg shadow-orange-100/50 transition pr-12">
                <button type="submit" class="absolute left-3 top-3 bg-orange-500 text-white px-5 py-2 rounded-xl hover:bg-orange-600 transition font-bold">
                    بحث
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            @php
                $categories = [
                    'protein' => ['title' => 'مصادر البروتين', 'icon' => '🥩', 'gradient' => 'from-orange-600 to-orange-500'],
                    'carbs'   => ['title' => 'مصادر الكربوهيدرات', 'icon' => '🍚', 'gradient' => 'from-orange-500 to-amber-500'],
                    'fat'     => ['title' => 'مصادر الدهون الصحية', 'icon' => '🥑', 'gradient' => 'from-amber-500 to-yellow-500']
                ];
            @endphp

            @foreach($categories as $key => $style)
            <div class="space-y-4">
                <div class="bg-gradient-to-l {{ $style['gradient'] }} text-white p-5 rounded-2xl flex items-center justify-between shadow-lg shadow-orange-200 transition-transform hover:scale-[1.02]">
                    <span class="font-black text-lg">{{ $style['title'] }}</span>
                    <span class="text-2xl">{{ $style['icon'] }}</span>
                </div>

                <div class="bg-white rounded-[2rem] shadow-sm border border-orange-100 overflow-hidden">
                    <ul class="divide-y divide-orange-50">
                        @if(isset($foods[$key]) && $foods[$key]->count() > 0)
                            @foreach($foods[$key] as $food)
                            <li class="p-5 hover:bg-orange-50/50 transition group">
                                <div class="flex justify-between items-start mb-3">
                                    <p class="font-bold text-slate-800 group-hover:text-orange-700 transition">{{ $food->food_name }}</p>
                                    <span class="text-[10px] bg-orange-100 text-orange-700 px-2 py-1 rounded-md font-bold">لكل 100ج</span>
                                </div>

                                <div class="grid grid-cols-3 gap-2">
                                    <div class="text-center p-2 bg-slate-50 rounded-xl border border-slate-100">
                                        <p class="text-[9px] text-slate-400 uppercase font-bold">بروتين</p>
                                        <p class="text-sm font-black text-slate-700">{{ $food->protein_per_100g }}ج</p>
                                    </div>
                                    <div class="text-center p-2 bg-slate-50 rounded-xl border border-slate-100">
                                        <p class="text-[9px] text-slate-400 uppercase font-bold">كارب</p>
                                        <p class="text-sm font-black text-slate-700">{{ $food->carbs_per_100g }}ج</p>
                                    </div>
                                    <div class="text-center p-2 bg-slate-50 rounded-xl border border-slate-100">
                                        <p class="text-[9px] text-slate-400 uppercase font-bold">دهون</p>
                                        <p class="text-sm font-black text-slate-700">{{ $food->fat_per_100g }}ج</p>
                                    </div>
                                </div>

                                <div class="mt-3 flex justify-between items-center px-1">
                                    <span class="text-[11px] text-orange-500 font-bold italic">
                                        🔥 {{ round($food->calories_per_gram * 100) }} سعرة
                                    </span>
                                </div>
                            </li>
                            @endforeach
                        @else
                            <li class="p-10 text-center">
                                <span class="text-4xl block mb-2">🍽️</span>
                                <p class="text-slate-400 text-sm italic">لا توجد أصناف متاحة حالياً</p>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            @endforeach

        </div>

        <div class="mt-12 p-8 bg-white rounded-[2.5rem] border-2 border-dashed border-orange-300 text-center shadow-sm">
            <h3 class="text-xl font-black text-orange-900 mb-2 font-bold italic">💡 تذكير </h3>
            <p class="text-orange-700 max-w-2xl mx-auto font-bold">
                الأرقام أعلاه تقريبية لكل 100 جرام من الصنف. تأكد من وزن طعامك قبل الطبخ للحصول على أدق النتائج!
            </p>
        </div>

    </div>

</body>
</html>
