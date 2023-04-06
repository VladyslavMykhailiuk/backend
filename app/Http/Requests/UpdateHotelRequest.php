<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateHotelRequest extends FormRequest
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
        $hotelId = $this->route('hotel')->id;
        return [
            'name' => ['sometimes','required','min:5','max:50','string',
            Rule::unique('hotels')->ignore($hotelId)],
            'address' => 'sometimes|required|min:10|max:100|string',
            'city' => 'sometimes|required|string',
            'description' => 'sometimes|required|min:30|max:3000|string',
            'stars' => 'sometimes|required|numeric|min:0|max:9.99',
            'average_cost' => 'sometimes|required|integer',
            'images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле ім\'я є обов\'язковим',
            'name.min' => 'Поле ім\'я повинно бути не менше 5 символів',
            'name.max' => 'Поле ім\'я повинно бути не більше 50 символів',
            'name.string' => 'Поле ім\'я повинно складатися з букв',
            'name.unique' => 'Таке ім\'я вже є, додайте інший',
            'address.required' => 'Поле адреса є обов\'язковим',
            'address.min' => 'Поле адреса повинно бути не менше 10 символів',
            'address.max' => 'Поле адреса повинно бути не більше 100 символів',
            'address.string' => 'Поле адреса повинно складатися з букв',
            'city.required' => 'Поле місто є обов\'язковим',
            'city.string' => 'Поле адреса повинно складатися з букв',
            'description.required' => 'Поле опису є обов\'язковим',
            'description.min' => 'Поле опис повинно бути не менше 30 символів',
            'description.max' => 'Поле адреса повинно бути не більше 3000 символів',
            'description.string' => 'Поле опису повинно складатися з букв',
            'stars.required' => 'Поле зірок є обов\'язковим',
            'stars.numeric' => 'Поле зірок повинно бути числом',
            'stars.min' => 'Поле зірок повинно бути не менше 0 ',
            'stars.max' => 'Поле адреса повинно бути не більше 9.99',
            'average_cost.required' => 'Поле середньої вартості є обов\'язковим',
            'average_cost.integer' => 'Поле середньої вартості повинно бути числом',
            'images' => 'Ви завантажили не картинку'
        ];
    }
}
