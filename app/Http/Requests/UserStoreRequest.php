<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'cedula' => 'required|numeric|unique:members,cedula',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|nullable|numeric',
            'correo' => 'required|email|unique:members,correo',
            'fecha_nacimiento' => 'required|date_format:m/d/Y',
            'profesion' => 'nullable|string|max:255',
            'red_social' => 'nullable|string|max:255',
            'usuario_red' => 'nullable|string|max:255',
            'genero' => 'required|in:hombre,mujer',
            'alcance' => 'required|string|max:255',
            'seccional' => 'nullable|exists:seccionales,id',
            'municipio' => 'nullable|exists:municipios,id',
            'parroquia' => 'nullable|exists:parroquias,id',
            'tipo_cargo' => 'nullable|string|max:255',
            'cargo' => 'nullable|string|max:255',
            'buro' => 'nullable|string|max:255',
            // 'esUsuario' => 'required|in:si,no',
        ];
    }
}
