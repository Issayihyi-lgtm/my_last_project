<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodSuggestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    // public function rules(): array
    // {
    //     return [
    //         'food_name'=>'required|string|max:100',
    //         'type'=>'required|in:protein,carbs,fat',
    //         'calories_per_gram'=>'required|numeric|min:1|max:20',
    //     ];
    // }


    public function rules(): array
{
    return [
        'food_name' => 'required|string|max:100',
        'type' => 'required|in:protein,carb,fat,mixed',
        'calories_per_gram' => 'required|numeric|min:0',

        'protein_per_100g' => ['nullable', 'numeric', 'min:0'],
        'carbs_per_100g'   => ['nullable', 'numeric', 'min:0'],
        'fat_per_100g'     => ['nullable', 'numeric', 'min:0'],
    ];
}

public function withValidator($validator)
{
    $validator->after(function ($validator) {

        $type = $this->type;

        $protein = $this->protein_per_100g;
        $carbs   = $this->carbs_per_100g;
        $fat     = $this->fat_per_100g;

        // 1) لو النوع protein → لازم يعبّي البروتين
        if ($type === 'protein' && empty($protein)) {
            $validator->errors()->add('protein_per_100g', 'يجب إدخال قيمة البروتين لهذا الصنف لأنه صنف بروتين.');
        }

        // 2) لو النوع carb → لازم يعبّي الكارب
        if ($type === 'carb' && empty($carbs)) {
            $validator->errors()->add('carbs_per_100g', 'يجب إدخال قيمة الكارب لهذا الصنف لأنه صنف كارب.');
        }

        // 3) لو النوع fat → لازم يعبّي الدهون
        if ($type === 'fat' && empty($fat)) {
            $validator->errors()->add('fat_per_100g', 'يجب إدخال قيمة الدهون لهذا الصنف لأنه صنف دهون.');
        }

        // 4) لو النوع mixed → لازم يدخل "قيمتين" على الأقل
        if ($type === 'mixed') {

            $filled = 0;
            if (!empty($protein)) $filled++;
            if (!empty($carbs))   $filled++;
            if (!empty($fat))     $filled++;

            if ($filled < 2) {
                $validator->errors()->add('mixed_values', 'يجب إدخال قيمتين على الأقل (بروتين/كارب/دهون) للصنف المختلط.');
            }
        }

    });
}
}
