<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('user')->id;
        return [
            'name' => 'sometimes|required|min:5|max:50|string',
            'email' => ['sometimes','required','email','string',
                Rule::unique('users')->ignore($userId)],
            'role_id' => 'sometimes|required|integer|exists:roles,id',
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
            'role_id.required' => 'Поле айді ролі є обов\'язковим',
            'role_id.integer' => 'Поле айді ролі повинно бути числом',
            'role_id.exists' => 'Поле айді ролі обрано некоректно',
        ];
    }
}
