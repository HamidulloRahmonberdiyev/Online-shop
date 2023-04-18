<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function messages(): array
    {
        return [
            'name.required' => 'Nomi kiritilmadi!',
            'price.required' => 'Narx kiritilmadi!',
            'images.required' => 'Rasm kiritilmadi!',
            'modifications.required' => 'Ranglar kiritilmadi!',
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
            'price' => 'required',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg|required|max:2048',
            'modifications' => 'required',
        ];
    }
}
