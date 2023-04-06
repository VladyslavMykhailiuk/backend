<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelCommentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'hotel_id'=>'required|integer|exists:hotels,id',
            'description' => 'required|min:30|max:3000|string',
        ];
    }

    public function messages(): array
    {
        return [
            'hotel_id.required' => 'Поле айді готелю є обов\'язковим',
            'hotel_id.integer' => 'Поле айді готелю повинно бути числом',
            'hotel_id.exists' => 'Поле айді готелю некоректно введено',
            'description.required' => 'Поле опису є обов\'язковим',
            'description.min' => 'Поле опис повинно бути не менше 30 символів',
            'description.max' => 'Поле адреса повинно бути не більше 3000 символів',
            'description.string' => 'Поле опису повинно складатися з букв',
        ];
    }
}
