<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBook extends FormRequest
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
            'nome' => 'required|min:3|max:50',

            'author_id' => 'required|exists:authors,id',
            'language_id' => 'required|exists:languages,id',
            'genero_id' => 'required|exists:generos,id',
            'editor_id' => 'required|exists:editors,id',
        ];
    }
}
