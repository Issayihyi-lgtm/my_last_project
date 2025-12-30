<?php

namespace App\Http\Controllers;

use App\Models\FoodSuggestion;
use Illuminate\Http\Request;

class FoodSuggestionController extends Controller
{
    public function index(Request $request)
    {
        $query = FoodSuggestion::query();

        // فلترة حسب النوع (بروتين، كارب، دهون)
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // البحث (تصحيح الكود)
        if ($request->filled('search')) {
            $query->where('food_name', 'like', '%' . $request->search . '%');
        }

        // جلب البيانات وترتيبها
        $allFoods = $query->orderBy('food_name')->get();

        // تجميع البيانات حسب النوع لإرسالها للـ Blade بشكل منظم
        $foods = $allFoods->groupBy('type');

        // إرجاع الفيو مع البيانات
        return view('foods.index', compact('foods'));
    }

    // public function show($id)
    // {
    //     $food = FoodSuggestion::findOrFail($id);
    //     // إذا كنت تريد عرض صفحة تفاصيل لكل نوع أكل
    //     return view('food_details', compact('food'));
    // }
}
