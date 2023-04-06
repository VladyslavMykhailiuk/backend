<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|min:5|max:50|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:10|max:50',
            'role_id' => 'required|integer|exists:roles,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле ім\'я є обов\'язковим',
            'name.min' => 'Поле ім\'я повинно бути не менше 5 символів',
            'name.max' => 'Поле ім\'я повинно бути не більше 50 символів',
            'name.string' => 'Поле ім\'я повинно складатися з букв',
            'email.required' => 'Поле e-mail є обов\'язковим',
            'email.string' => 'Поле e-mail повинно складатися з букв',
            'email.email' => 'Поле e-mail некоректно вказано',
            'email.unique' => 'Таке ім\'я вже є, додайте інший',
            'password.required' => 'Поле пароль є обов\'язковим',
            'password.string' => 'Поле пароль повинно складатися з букв',
            'password.min' => 'Поле пароль повинно бути не менше 10 символів',
            'password.max' => 'Поле пароль повинно бути не більше 50 символів',
            'role_id.required' => 'Поле айді ролі є обов\'язковим',
            'role_id.integer' => 'Поле айді ролі повинно бути числом',
            'role_id.exists' => 'Поле айді ролі обрано некоректно',
        ];
    }
}
