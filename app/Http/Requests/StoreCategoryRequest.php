<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'name.required' => 'Nomi kiritilmadi!',
            'image.required' => 'Rasm kiritilmadi!',
            'image.max' => 'Yuklanayotgan fayl hajmi 2 mb katta!',
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
            'name' => 'required|min:3|max:255',
            'image' => 'required|max:2048|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
