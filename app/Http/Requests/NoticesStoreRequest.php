<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticesStoreRequest extends FormRequest
{
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
    public function messages()
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'link.url' => 'El enlace debe ser una URL válida.',
            'content.required' => 'El contenido es obligatorio.',
        ];
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'link' => 'nullable',
            'content' => 'required|string',
        ];
    }

}
