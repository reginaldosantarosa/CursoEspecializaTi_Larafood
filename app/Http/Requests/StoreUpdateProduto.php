<?php

namespace App\Http\Requests;

use App\Empresa\Rules\UniqueEmpresa;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduto extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(3);

        $rules = [
            'titulo' => ['required', 'min:3', 'max:255'
                ,new UniqueEmpresa('produtos', $id)],
            //    "unique:produtos,titulo,{$id},id"],
            'descricao' => ['required', 'min:3', 'max:500'],
            'imagem' => ['required', 'image'],

            'preco' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ];

        if ($this->method() == 'PUT') {
            $rules['imagem'] = ['nullable', 'image'];
        }

        return $rules;
    }
}
