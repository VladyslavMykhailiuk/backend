<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
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
            'hotel_id'=>'sometimes|required|integer|exists:hotels,id',
            'name' => 'sometimes|required|min:10|max:100|string',
            'description' => 'sometimes|required|min:30|max:3000|string',
            'class' => 'sometimes|required|min:3|max:30|string',
            'persons' => 'sometimes|required|integer',
            'price' => 'sometimes|required|integer',
            'arrival_date' => 'sometimes|required|date',
            'departure_day' => 'sometimes|required|date',
            'images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'hotel_id.required' => 'Поле айді готелю є обов\'язковим',
            'hotel_id.integer' => 'Поле айді готелю повинно бути числом',
            'hotel_id.exists' => 'Поле айді готелю некоректно введено',
            'name.required' => 'Поле ім\'я є обов\'язковим',
            'name.min' => 'Поле ім\'я повинно бути не менше 10 символів',
            'name.max' => 'Поле ім\'я повинно бути не більше 100 символів',
            'name.string' => 'Поле ім\'я повинно складатися з букв',
            'name.unique' => 'Таке ім\'я вже є, додайте інший',
            'description.required' => 'Поле опису є обов\'язковим',
            'description.min' => 'Поле опис повинно бути не менше 30 символів',
            'description.max' => 'Поле адреса повинно бути не більше 3000 символів',
            'description.string' => 'Поле опису повинно складатися з букв',
            'class.required' => 'Поле класу є обов\'язковим',
            'class.min' => 'Поле класу повинно бути не менше 3 символів',
            'class.max' => 'Поле адреса повинно бути не більше 30 символів',
            'class.string' => 'Поле адреса повинно складатися з букв',
            'persons.required' => 'Поле к-сті людей є обов\'язковим',
            'persons.integer' => 'Поле к-сті людей повинно бути числом',
            'price.required' => 'Поле к-сті людей є обов\'язковим',
            'price.integer' => 'Поле к-сті людей повинно бути числом',
            'arrival_date.required' => 'Поле дати заїзду є обов\'язковим',
            'arrival_date.date' => 'Поле дати заїзду повинно бути датою',
            'departure_day.required' => 'Поле дати виїзду є обов\'язковим',
            'departure_day.date' => 'Поле дати виїзду повинно бути датою',
            'images' => 'Ви завантажили не картинку'
        ];
    }
}
