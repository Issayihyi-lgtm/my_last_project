<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserDataRequest extends FormRequest
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
            'age'=>'required|integer|min:1',
            'weight'=>'required|numeric|min:20|max:300',
            'height'=>'required|numeric|min:80|max:250',
            'activity'=>'required|in:none,light,medium,high,very_high',
            'gender'=>'required|in:male,female',
            'goal'=>'required|in:cut,bulk,maintain',

        ];
    }
}
