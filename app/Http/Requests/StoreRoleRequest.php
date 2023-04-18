<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'name.required' => 'Nomi kiritilmadi!',
            'name.unique' => 'Kechirasiz bu role nomi band qilingan!'
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
            'name' => 'required|max:255|min:3|unique:roles,name',
        ];
    }
}
