<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رشاقة </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Cairo', sans-serif; } </style>
    <link rel="icon" type="image/png" href="{{asset('healthy-food.png')}}">
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="text-center p-8 max-w-lg">
        <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>

        <h1 class="text-4xl font-extrabold text-gray-800 mb-4">مرحباً بك في <span class="text-green-600">رشاقة</span></h1>
        <p class="text-gray-600 mb-10 text-lg">خطوتك الأولى نحو جسم مثالي تبدأ من هنا. احسب سعراتك بدقة وخطط لنظامك الغذائي بسهولة.</p>

        <div class="flex flex-col space-y-4">
            <a href="{{ route('register.form') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-4 px-8 rounded-2xl shadow-lg transition duration-300 transform hover:scale-105">
                ابدأ رحلتك الآن (إنشاء حساب)
            </a>

            <a href="{{ route('login.form') }}" class="bg-white border-2 border-gray-200 text-gray-700 hover:border-green-500 hover:text-green-600 font-bold py-4 px-8 rounded-2xl transition duration-300">
                لديك حساب بالفعل؟ تسجيل دخول
            </a>
        </div>


    </div>

</body>
</html>
