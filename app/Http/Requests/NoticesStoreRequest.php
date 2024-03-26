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
            'titulo.required' => 'El título es obligatorio.',
            'link.url' => 'El enlace debe ser una URL válida.',
            'contenido.required' => 'El contenido es obligatorio.',
            'archivo.required' => 'El archivo es obligatorio.',
            'archivo.mimes' => 'El archivo debe ser una imagen o un video.',
        ];
    }

    public function rules()
    {
        return [
            'titulo' => 'required|string|max:255',
            'link' => 'nullable|url',
            'contenido' => 'required|string',
            'archivo' => 'required|file|mimes:jpeg,png,gif,mp4,mov,avi',
        ];
    }

}
