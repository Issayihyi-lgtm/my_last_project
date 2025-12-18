<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMacroResultRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            // 'user_id'=>'required|integer',
            'age'=>'sometimes|integer|min:1',
            'weight'=>'sometimes|numeric|min:20|max:300',
            'height'=>'sometimes|numeric|min:80|max:250',
            'activity'=>'sometimes|in:none,light,medium,high,very_high',
            'gender'=>'sometimes|in:male,female',
            'goal'=>'sometimes|in:cut,bulk,maintain',

        ];

    }
}
