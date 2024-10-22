<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
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
            'marca_id' => 'required|exists:marcas,id',
            'serie_id' => 'nullable',
            'numero_serie' => 'nullable|integer',
            'numero_coleccion' => 'nullable|integer',
            'eliminado' => 'boolean',
        ];
    }
}
