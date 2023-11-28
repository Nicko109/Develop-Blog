<?php

namespace App\Http\Requests\PostImage;

use Illuminate\Foundation\Http\FormRequest;

class StorePostImageRequest extends FormRequest
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
            'image' => 'required|file'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Это поле необходимо для заполнения',
            'image.file' => 'Необходимо выбрать изобоажение',
        ];
    }
}
