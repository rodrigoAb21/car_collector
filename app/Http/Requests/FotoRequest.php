<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FotoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'url_foto' => 'required|url|max:255',
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'eliminado' => 'boolean',
        ];
    }
}

