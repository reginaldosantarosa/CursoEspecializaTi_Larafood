<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
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
            'identify' => $this->uuid,
            'title' => $this->titulo,
            'image' => url("storage/{$this->imagem}"),
            'price' => $this->preco,
            'description' => $this->descricao,
        ];
    }
}
