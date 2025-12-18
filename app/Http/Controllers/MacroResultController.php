<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMacroResultRequest;
use App\Models\MacroResult;
use Illuminate\Http\Request;

use function Symfony\Component\Clock\now;

class MacroResultController extends Controller
{
    public function calculate(StoreMacroResultRequest $request)
    {
        $user = auth()->user();
        $data = $user->data;

        if (!$data) {
            return response()->json(['message' => 'User data not found.'], 404);
        }

        $weight = $data->weight;
        $height = $data->height;
        $age = $data->age;
        $gender = $data->gender;
        $activity = $data->activity;
        $goal = $data->goal;

        // 1️⃣ حساب BMR باستخدام معادلة Mifflin-St Jeor
        if ($gender === 'male') {
            $bmr = 10 * $weight + 6.25 * $height - 5 * $age + 5;
        } else {
            $bmr = 10 * $weight + 6.25 * $height - 5 * $age - 161;
        }

        // 2️⃣ تعديل حسب مستوى النشاط
        $activityMultiplier = match($activity) {
            'none' => 1.2,
            'light' => 1.375,
            'medium' => 1.55,
            'high' => 1.725,
            'very_high' => 1.9,
        };
        $tdee = $bmr * $activityMultiplier;

        // 3️⃣ تعديل حسب الهدف
        $tdee = match($goal) {
            'cut' => $tdee - 500,
            'bulk' => $tdee + 500,
            'maintain' => $tdee,
        };
               // حساب البروتين حسب الهدف
        $protein = match($goal) {
           'bulk' => $weight * 1.8,      // تضخيم
           'cut'  => $weight * 2,        // تنشيف
           'maintain' => $weight * 1.6,     // محافظة ;
        };
        // / حساب الدهون (ثابت)
        $fat = $weight * 0.8;

        // / حساب الكارب بناء على السعرات المتبقية
        $carbs = ($tdee - ($protein * 4 + $fat * 9)) / 4;



        // 5️⃣ حفظ النتيجة في جدول MacroResult
        $result = MacroResult::create([
            'user_id' => auth()->user()->id,
            'calories' => round($tdee),
            'protein' => round($protein),
            'carbs' => round($carbs),
            'fat' => round($fat),
            'bmr'=> round($bmr),
            'tdee'=> round($tdee),
            'goal'=>str($goal),
            'result_date'=> now(),
        ]);

        return response()->json([
            'message' => 'Calorie calculation completed',
            'result' => $result
        ]);
    }


}
