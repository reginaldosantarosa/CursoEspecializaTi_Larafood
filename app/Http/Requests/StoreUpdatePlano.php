<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlano extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // alterado manual!!!!
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()

    {
        $url = $this->segment(3);
        return [
            'nome' => "required|min:3|max:255|unique:planos,nome,{$url},url",
            'descricao' => 'nullable|min:3|max:255',
            'preco' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ];
    }
}
