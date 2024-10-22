<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoDeseadoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|max:255',
            'codigo' => 'nullable|max:255',
            'marca' => 'nullable|max:255',
            'serie' => 'nullable|max:255',
        ];
    }
}
