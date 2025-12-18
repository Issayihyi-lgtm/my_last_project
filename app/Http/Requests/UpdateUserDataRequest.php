<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserDataRequest extends FormRequest
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
            'weight'=>'sometimes|numeric',
            'height'=>'sometimes|numeric',
            'activity'=>'sometimes|in:none,light,medium,high,very_high',
            'gender'=>'sometimes|in:male,female',
            'goal'=>'in:cut,bulk,maintain',
        ];
    }
}
