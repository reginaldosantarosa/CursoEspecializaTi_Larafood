<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedido extends FormRequest
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
        return [
            'token_company' => [
                'required',
                'exists:empresas,uuid'
            ],
            'mesa' => [
                'nullable',     //nao é obrogatorio
                'exists:mesas,uuid', //mas se voer, temq ue xistir na tabela e na coluna indicada
            ],
            'comentario' => [
                'nullable',
                'max:1000',
            ],
            'produtos' => ['required'],
            'produtos.*.identificacao' => ['required', 'exists:produtos,uuid'],
            //'produtos.*.quantidade' => ['required', 'integer'],
        ];
    }
}
