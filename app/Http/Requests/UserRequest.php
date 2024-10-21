<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|max:255',
            'email' => 'required|email|max:191|unique:usuarios,email',
            'password' => 'required|max:255',
            'eliminado' => 'boolean',
        ];
    }
}
