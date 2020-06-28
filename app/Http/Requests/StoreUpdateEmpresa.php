<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEmpresa extends FormRequest
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
            'nome' => ['required', 'min:3', 'max:255', "unique:empresas,nome,{$id},id"],
            'email' => ['required', 'min:3', 'max:255', "unique:empresas,email,{$id},id"],
            'cnpj' => ['required', 'digits:5', "unique:empresas,cnpj,{$id},id"],
            'logo' => ['nullable', 'image'],
            'ativo' => ['required', 'in:S,N'],

            // subscription
            'inscricao' => ['nullable', 'date'],
            'expira_acesso' => ['nullable', 'date'],
            'inscricao_id' => ['nullable', 'max:255'],
            'inscricao_ativa' => ['nullable', 'boolean'],
            'inscricao_suspensa' => ['nullable', 'boolean'],
        ];

        return $rules;
    }
}
