<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGenero extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|unique:generos,nome',
        ];
    }

    public function messages()
    {
        return [
            'nome.unique' => 'Esse nome de gênero já está em uso.',
            'nome.required' => 'O campo nome é obrigatório.',
        ];
    }
}

