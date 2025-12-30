<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم |  رشاقة</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Cairo', sans-serif; } </style>
    <link rel="icon" type="image/png" href="{{asset('healthy-food.png')}}">
</head>
<body class="bg-slate-100 min-h-screen">

    <nav class="bg-white shadow-sm py-4 px-6 flex justify-between items-center mb-8">
        <span class="font-extrabold text-xl text-indigo-600">رشاقة <span class="text-slate-800">PRO</span></span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="text-sm text-red-500 font-bold">تسجيل خروج</button>
        </form>
    </nav>

    <div class="max-w-5xl mx-auto px-4">
        <header class="mb-10 text-right">
            <h1 class="text-3xl font-extrabold text-slate-800">أهلاً بك يابطل 👋</h1>
            <p class="text-slate-500 mt-2">اختر وجهتك اليوم لتصل لهدفك</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <a href="{{ route('profile.user_data.create') }}" class="group bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all border-b-8 border-blue-500 flex flex-col items-center text-center transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-blue-500 transition-colors">
                    <svg class="w-8 h-8 text-blue-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800">تحديث البيانات</h3>
                <p class="text-sm text-slate-500 mt-2 italic">وزنك، طولك، ونشاطك البدني</p>
            </a>

            <a href="{{ route('calories.show') }}" class="group bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all border-b-8 border-green-500 flex flex-col items-center text-center transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-green-500 transition-colors">
                    <svg class="w-8 h-8 text-green-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800">حساب السعرات</h3>
                <p class="text-sm text-slate-500 mt-2 italic">عرض احتياجك من الماكروز</p>
            </a>

            <a href="{{ route('food.index') }}" class="group bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all border-b-8 border-orange-500 flex flex-col items-center text-center transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-orange-500 transition-colors">
                    <svg class="w-8 h-8 text-orange-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800">مصادر التغذية</h3>
                <p class="text-sm text-slate-500 mt-2 italic">أفضل الأطعمة لسد احتياجك</p>
            </a>

        </div>
    </div>

</body>
</html>
