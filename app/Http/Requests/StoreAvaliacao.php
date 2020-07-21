<?php

namespace App\Http\Requests;

use App\Repositories\Contracts\PedidoRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class StoreAvaliacao extends FormRequest
{

    public function authorize()
    {
        if (!$cliente = auth()->user()) {
            return false;
        }

        if (!$pedido = app(PedidoRepositoryInterface::class)->getPedidoByIdentificacao($this->identificacaoPedido)) {
            return false;
        }

        return $cliente->id == $pedido->cliente_id;
    }


    public function rules()
    {
        return [
            'estrelas' => ['required', 'integer', 'min:1', 'max:5'],
            'comentarios' => ['nullable', 'min:3', 'max:1000'],
        ];
    }
}
