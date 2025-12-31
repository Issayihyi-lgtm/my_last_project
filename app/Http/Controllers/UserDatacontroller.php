<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;
use App\Models\MacroResult;
use App\Http\Requests\StoreUserDataRequest;
use Illuminate\Support\Facades\Auth;

class UserDataController extends Controller
{
    public function create()
    {
        return view('profile.user_data');
    }

    public function store(StoreUserDataRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();

        // --- الحسابات الرياضية  ---
        if ($data['gender'] === 'male') {
            $bmr = (10 * $data['weight']) + (6.25 * $data['height']) - (5 * $data['age']) + 5;
        } else {
            $bmr = (10 * $data['weight']) + (6.25 * $data['height']) - (5 * $data['age']) - 161;
        }

        $multipliers = ['none' => 1.2, 'light' => 1.375, 'medium' => 1.55, 'high' => 1.725, 'very_high' => 1.9];
        $tdee = $bmr * $multipliers[$data['activity']];

        if ($data['goal'] === 'cut') {
            $calories = $tdee - 500;
            $proteinMultiplier = 2.0;
        } elseif ($data['goal'] === 'bulk') {
            $calories = $tdee + 400;
            $proteinMultiplier = 1.6;
        } else {
            $calories = $tdee;
            $proteinMultiplier = 1.8;
        }

        $protein = $data['weight'] * $proteinMultiplier;
        $fats = ($calories * 0.25) / 9;
        $carb = ($calories - ($protein * 4) - ($fats * 9)) / 4;

        // --- التقسيم الجديد للحفظ ---

        // 1. حفظ البيانات الأساسية في جدول user_data
        $user->data()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'weight'   => $data['weight'],
                'height'   => $data['height'],
                'age'      => $data['age'],
                'gender'   => $data['gender'],
                'activity' => $data['activity'],
                'goal'     => $data['goal'],
            ]
        );

        // 2. حفظ النتائج في جدول macro_results
        $user->macroResult()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'calories' => round($calories),
                'protein'  => round($protein),
                'fat'      => round($fats),
                'carbs'    => round($carb),
            ]
        );

        return redirect()->route('calories.show');
    }

    public function show()
    {
        $user = Auth::user();

        // جلب البيانات من الجدولين لعرضها في صفحة النتائج
        $userData = $user->data;
        $macroResults = $user->macroResult;

        if (!$userData || !$macroResults) {
            return redirect()->route('profile.user_data.create')->with('error', 'يرجى إدخال بياناتك أولاً');
        }

        return view('calories.show', compact('userData', 'macroResults'));
    }
}
