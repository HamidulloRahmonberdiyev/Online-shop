<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    public function messages(): array
    {
        return [
            'name.required' => 'Login kiritilmadi!',
            'email.required' => 'Email kiritilmadi!',
            'phone.required' => 'Telefon raqam kiritilmadi!',
            'password.required' => 'Parol kiritilmadi!',
            'password_confirmation.required' => 'Parol tasdiqlanmadi!',
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|min:3',
            'email' => 'required|email:rfc|unique:users,email',
            'phone' => 'required|max:13|min:9|unique:users,phone',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ];
    }
}
