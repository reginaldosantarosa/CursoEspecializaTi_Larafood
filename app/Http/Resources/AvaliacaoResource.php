<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AvaliacaoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'estrelas' => $this->estrelas,
            'comentario' => $this->comentario,
            'cliente' => new ClienteResource($this->cliente),
            // 'pedido' => new PedidoResource($this->pedido),
        ];
    }
}
