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
            'identificacao' => $this->uuid,
            'titulo' => $this->titulo,
            'imagem' => url("storage/{$this->imagem}"),
            'preco' => $this->preco,
            'descricao' => $this->descricao,
        ];
    }
}
